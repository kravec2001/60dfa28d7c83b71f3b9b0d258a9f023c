<?php
$botToken = "2118061006:AAG3W6WL4Kik-YQMTJObUVEKn_sSQjZrCf8";
$website = "https://api.telegram.org/bot".$botToken;
$update = file_get_contents($website);
$update = json_decode($update, TRUE);
var_dump($update); exit;

$data = json_decode(file_get_contents('php://input'), TRUE);
//пишем в файл лог сообщений
file_put_contents('file.txt', '$data: '.print_r($data, 1)."\n", FILE_APPEND);
//697558447
$data = $data['callback_query'] ? $data['callback_query'] : $data['message'];

const TOKEN = '2118061006:AAG3W6WL4Kik-YQMTJObUVEKn_sSQjZrCf8';
$bot_api = 'https://api.telegram.org/bot'. TOKEN ;

$message = mb_strtolower(($data['text'] ? $data['text'] : $data['data']),'utf-8');
$send_data['chat_id'] = $data['chat'] ['id'];
//--
$user_id = $data['message']['from']['id'];  // выделяем идентификатор юзера
$fname = $data['message']['chat']['first_name']; // выделяем имя собеседника
$lname = $data['message']['chat']['last_name'];  // выделяем фамилию собеседника
$uname['chat_id'] = $data['chat'] ['username'];   // выделяем ник собеседника
$chat_id =$data['message']['chat']['id'];   // выделяем чат собеседника

//if(!$user_id){    // если в сообщении нет иденификатора юзера
//    exit();       // завершаем работу скрипта
//}

// пытаемся подключиться к БД
$hostname        = "188.120.226.130";
$port        = "5432";
$dbname      = "psb";
$username = "postgres";
$pass = "OeEAqM7Skqp52kQPCw32";

// Create connection
$db = pg_connect("host = $hostname dbname = $dbname user = $username password = $pass");

if(!$db) {
    echo "Error : Unable to open database\n";
    //sendMessage(697558447,'Не удалось подключиться к БД');
} else {
    echo "Opened database successfully\n";
    //sendMessage(697558447,'Удалось подключиться к БД');
}

//$sql = "UPDATE psb_user set chat_id = $send_data where Profile_telegram = $uname;";
$data_where = array('Profile_telegram' => $uname['chat_id']);
$data_upd = array('chat_id' => $send_data['chat_id'] );
$ret = pg_update($db, 'psb_user', $data_upd , $data_where);
//$ret = pg_query($db, $sql);
if(!$ret) {
    echo pg_last_error($db);
    exit;
} else {
    echo "Record updated successfully\n";
}

pg_close($db);
// ---------------------
// обязательное. Запуск бота
$bot_api -> command('start', function ($message) use ($bot_api ) {
    $answer = 'Добро пожаловать!';
    $bot_api ->sendMessage($message->getChat()->getId(), $answer);
});

// помощ
$bot_api -> command('help', function ($message) use ($bot_api ) {
    $answer = 'Команды:
/help - помощ';
    $bot_api -> sendMessage($message->getChat()->getId(), $answer);
});

// запускаем обработку
$bot_api ->run();

$button_yes = array('text' => 'Да', 'callback_data' => '/yes',);
$button_no = array('text' => 'Нет', 'callback_data' => '/no');
$keyboard = array('inline_keyboard' => array(array($button_yes, $button_no)));
sendMessage($chat_id, "Вы любите пиццу?", $keyboard);

switch ($message) {
case 'да':
$method = 'sendMessage';
$send_data = [
'text' => 'Что Вас интересует?',
'reply_markup'  => [
'resize_keyboard' => true,
'keyboard' => [
[
['text' => 'Кадры'],
['text' => 'Бухгалтерия'],
],
[
['text' => 'Разработка'],
['text' => 'Общие'],
]
]
]
];
break;
case 'нет':
$method = 'sendMessage';
$send_data = ['text' => 'До встречи'];
break;
case 'Кадры':
$method = 'sendMessage';
$send_data = ['text' => 'Информация по кадрам принята!'];
break;
case 'Бухгалтерия':
$method = 'sendMessage';
$send_data = ['text' => 'Информация по бухгалтерии принята!'];
break;
case 'Разработка':
$method = 'sendMessage';
$send_data = ['text' => 'Информация по разработке принята!'];
break;
case 'Общие':
$method = 'sendMessage';
$send_data = ['text' => 'Информация по общим принята!'];
break;
default:
$method = 'sendMessage';
$send_data = [
'text' => 'Вас точно это интересует?',
'reply_markup'  => [
'resize_keyboard' => true,
'keyboard' => [
[
['text' => 'Да'],
['text' => 'Нет'],
]
]
]
];
}



$res = sendTelegram($method, $send_data);


/* Функция отправки сообщения в чат с использованием метода sendMessage*/
function sendMessage($var_chat_id,$var_message){
    file_get_contents($GLOBALS['bot_api'].'/sendMessage?chat_id='.$var_chat_id.'&text='.urlencode($var_message));
}

function sendTelegram($method, $data, $headers = [])
{
$curl = curl_init();
curl_setopt_array($curl, [
CURLOPT_POST => 1,
CURLOPT_HEADER => 0,
CURLOPT_RETURNTRANSFER => 1,
CURLOPT_URL => 'https://api.telegram.org/bot' . TOKEN . '/' . $method,
CURLOPT_POSTFIELDS => json_encode($data),
CURLOPT_HTTPHEADER => array_merge(array("Content-Type: application/json"))
]);
$result = curl_exec($curl);
curl_close($curl);
return (json_decode($result, 1) ? json_decode($result, 1) : $result);
}

