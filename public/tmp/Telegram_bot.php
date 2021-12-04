<?php

$data = json_decode(file_get_contents('php://input'), TRUE);
//пишем в файл лог сообщений
file_put_contents(__DIR__ .'file.txt', '$data: '.print_r($data, 1)."\n", FILE_APPEND);

$data = $data['callback_query'] ? : $data['message'];

const TOKEN = '2118061006:AAG3W6WL4Kik-YQMTJObUVEKn_sSQjZrCf8';
$bot_api = 'https://api.telegram.org/bot'. TOKEN;

$message = mb_strtolower(($data['text'] ? : $data['data']),'utf-8');
$send_data['chat_id'] = $data['chat'] ['id'];
//--

    $chat_id = $data['message']['from']['id'];
    $user_name = $data['message']['from']['username'];
    $first_name = $data['message']['from']['first_name'];
    $last_name = $data['message']['from']['last_name'];
    $text = trim($data['message']['text']);
    $text_array = explode(" ", $text);
    $uname['chat_id'] = $data['chat'] ['username'];   // выделяем ник собеседника

    if ($text == '/help') {
        $text_return = "Добро пожаловать, $first_name $last_name, вот команды, что я понимаю: 
/help - список команд
";
        //message_to_telegram($bot_api, $chat_id, $text_return);
        sendMessage($chat_id,$text_return);
    }
    elseif ($text == '/start') {
        $text_return = "Добро пожаловать, $first_name $last_name";
        sendMessage($chat_id,$text_return);
    }



//$user_id = $data['message']['from']['id'];  // выделяем идентификатор юзера
//$fname = $data['message']['chat']['first_name']; // выделяем имя собеседника
//$lname = $data['message']['chat']['last_name'];  // выделяем фамилию собеседника
//$uname['chat_id'] = $data['chat'] ['username'];   // выделяем ник собеседника
//$chat_id =$data['message']['chat']['id'];   // выделяем чат собеседника

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
//    sendMessage(697558447,'Не удалось подключиться к БД');
} else {
    echo "Opened database successfully\n";
//    sendMessage(697558447,'Удалось подключиться к БД');
}

//sendMessage(697558447,'Приветствуем, Светлана!

//Рады, что Вы присоединились к Промсвязьбанку.
//Дата выхода на работу 02.12.2021.
//Рабочий день с 8 до 17:00.
//Вам необходимо принести с собой ИНН, паспорт, снилс.
//Парковка находится на ул. Ленина, 34
//Ваш HR специалист Петрова Елена Ивановна - 2596985
//Ваш руководитель Волков Александр Владимирович - 89131856345.

//До встречи!');
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
$button_bad = array('text' => '\xF0\x9F\x98\xA8', 'callback_data' => '/bad',);
//$button_neytr = array('text' => '\xF0\x9F\x98\x92', 'callback_data' => '/neitr');
$button_good = array('text' => '\xF0\x9F\x98\x8A', 'callback_data' => '/good');
$keyboard = array('inline_keyboard' => array(array($button_bad, $button_good )));
sendMessage(697558447, "Как у Вас прошел день?", $keyboard);
pg_close($db);
// ---------------------
// Основной код: получаем сообщение, что юзер отправил боту и
// заполняем переменные для дальнейшего использования

// функция отправки сообщени в от бота в диалог с юзером
function message_to_telegram($bot_token, $chat_id, $text, $reply_markup = '')
{
    $ch = curl_init();
    $ch_post = [
        CURLOPT_URL => 'https://api.telegram.org/bot' . $bot_token . '/sendMessage',
        CURLOPT_POST => TRUE,
        CURLOPT_RETURNTRANSFER => TRUE,
        CURLOPT_TIMEOUT => 10,
        CURLOPT_POSTFIELDS => [
            'chat_id' => $chat_id,
            'parse_mode' => 'HTML',
            'text' => $text,
            'reply_markup' => $reply_markup,
        ]
    ];

    curl_setopt_array($ch, $ch_post);
    curl_exec($ch);
}


//$res = sendTelegram($method, $send_data);


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

