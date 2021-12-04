<?php

$data = json_decode(file_get_contents('php://input'), TRUE);
//пишем в файл лог сообщений

file_put_contents('file.txt', '$data: '.print_r($data, 1)."\n", FILE_APPEND);

//$data = $data['callback_query'] ? $data['callback_query'] : $data['message'];

$TOKEN = '5071097377:AAH6JKp6fNwSuLZvEPII5GQ08jdIX_IaAuQ';
$BOT_API = 'https://api.telegram.org/bot'. $TOKEN;

//$res = sendTelegram($method, $send_data);

//$message = mb_strtolower(($data['text'] ?: $data['data']),'utf-8');

$send_data['chat_id'] = $data['chat'] ['id'];
//--

    $chat_id = $data['message']['from']['id'];
    $user_name = $data['message']['from']['username'];
    $first_name = $data['message']['from']['first_name'];
    $text  = trim($data['message']['text']);
    $text_array = explode(" ", $text);
    $uname['chat_id'] = $data['chat'] ['username'];   // выделяем ник собеседника
    $data_where = array('Profile_telegram' => $uname['chat_id']);
    $data_upd = array('chat_id' => $send_data['chat_id'] );
   // $text_ar = array('text' => $text['chat_id'] );

@$callback_query = $data['callback_query'];
@$data_in = $callback_query['data'];
@$chat_id_in = $callback_query['message']['chat']['id'];
@$message_id = $callback_query['message']['message_id'];
// inline keyboard set:
$inline_button1 = array("inline_message_id"=>"1","text"=>"Были трудности \xF0\x9F\x98\xA8","callback_data"=>'/1');
$inline_button2 = array("inline_message_id"=>"2","text"=>"Отлично \xF0\x9F\x98\x8A","callback_data"=>'/2');
$inline_keyboard1 = [[$inline_button1,$inline_button2]];
$keyboard1=array("inline_keyboard"=>$inline_keyboard1);

// do markup with inline keyboard:
$replyMarkup1 = json_encode($keyboard1);

if (!empty($data['message']['text'])) {
    $text = $data['message']['text'];
    echo "тралалал";
}

//echo $uname['chat_id'];
//echo $data_upd;

//    if ($text == "/help") {
//        $text_return = "Вот команды, что я понимаю:
///help /today /back
//";
        //message_to_telegram($bot_api, $chat_id, $text_return);
//        sendMessage($chat_id,$text_return);
//    }
//    elseif ($text == "/start") {
//        $text_return = "Добро пожаловать, $first_name ! Вас приветствует помощник Ньютон.";
//        sendMessage($chat_id,$text_return);
//    }

// команды
$back = [
    'text' => 'Как прошел день?',
    'reply_markup'  => [
        'resize_keyboard' => true,
        'keyboard' => [
                ['text' => '\xF0\x9F\x98\xA8'],
                ['text' => '\xF0\x9F\x98\x92'],
                ['text' => '\xF0\x9F\x98\x8A'],
              ]
    ]
];
switch ($text) {
    case '/start':
        sendMessage($chat_id, "Добро пожаловать, $first_name ! Вас приветствует помощник Ньютон.");
        break;
    case '/help':
        sendMessage($chat_id, "Вот команды, что я понимаю: 
/help /today /back
");
        break;
    case '/today':
        sendMessage($chat_id, "Приветствуем, $first_name !
Рады, что Вы присоединились к Промсвязьбанку.
Дата выхода на работу 02.12.2021.
Рабочий день с 8 до 17:00.
Вам необходимо принести с собой ИНН, паспорт, снилс.
Парковка находится на ул. Ленина, 34
Ваш HR специалист Петрова Елена Ивановна - 2596985
Ваш руководитель Волков Александр Владимирович - 89131856345.

До встречи!");
        break;
    case '/back':
        //$myDebug = "<pre>". json_encode($data_in) ."</pre>";
        //sendKeyboard($chat_id, $myDebug, $replyMarkup1); //send message with inline keyboard
        sendKeyboard($chat_id, "Как прошел день?", $replyMarkup1); //send message with inline keyboard
        break;
}
// callback data
switch($data_in){
    case '/1':
        // чтоб не крутились часы, посылаем пустой ответ при нажатии на кнопку.
        // for delete "clock" on keyboard button - send null callback query answer:
        send_answerCallbackQuery($callback_query['id'], 'Спасибо за ответ', true);
        //$myDebug = "<pre>". json_encode($data_in) ."</pre>";
        //sendKeyboard($chat_id_in, $myDebug, "");
        break;
    case '/2':
        send_answerCallbackQuery($callback_query['id'],'Спасибо за ответ',true);
        //$myDebug = "<pre>". json_encode($data_in) ."</pre>";
        //sendKeyboard($chat_id_in, $myDebug, "");
        break;
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
//   sendMessage(697558447,'Удалось подключиться к БД');
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

$ret = pg_update($db, 'psb_user', $data_upd , $data_where);
//$ret = pg_query($db, $sql);
if(!$ret) {
    echo pg_last_error($db);
    exit;
} else {
    echo "Record updated successfully\n";
}
//$button_bad = array('text' => '\xF0\x9F\x98\xA8', 'callback_data' => '/bad',);
//$button_neytr = array('text' => '\xF0\x9F\x98\x92', 'callback_data' => '/neitr');
//$button_good = array('text' => '\xF0\x9F\x98\x8A', 'callback_data' => '/good');
//$keyboard = array('inline_keyboard' => array(array($button_bad, $button_good )));
//sendMessage( $chat_id, "Как у Вас прошел день?", $keyboard);
pg_close($db);


/* Функция отправки сообщения в чат с использованием метода sendMessage*/
function sendMessage($var_chat_id,$var_message){
    file_get_contents($GLOBALS['BOT_API'].'/sendMessage?chat_id='.$var_chat_id.'&text='.urlencode($var_message) . '&parse_mode=html');
}

// Посылаем сообщение с клавиатурой (send message with inline keyboard in reply markup)
function sendKeyboard($chat_id, $message, $replyMarkup) {
    file_get_contents($GLOBALS['BOT_API'] . '/sendMessage?chat_id=' . $chat_id . '&text=' . urlencode($message) . '&parse_mode=html&reply_markup=' . $replyMarkup);
}

// Посылае ответ на нажатие кнопок (send callback query answer):
function send_answerCallbackQuery($callback_query_id, $text, $show_alert){
    file_get_contents($GLOBALS['BOT_API'] . '/answerCallbackQuery?callback_query_id=' . $callback_query_id . '&text=' . $text . '&show_alert=' . $show_alert );
}
// ---------------------
// Основной код: получаем сообщение, что юзер отправил боту и
// заполняем переменные для дальнейшего использования

//function sendTelegram($method, $data, $headers = [])
//{
//    $curl = curl_init();
//    curl_setopt_array($curl, [
//        CURLOPT_POST => 1,
//        CURLOPT_HEADER => 0,
//        CURLOPT_RETURNTRANSFER => 1,
//        CURLOPT_URL => 'https://api.telegram.org/bot' . $token . '/' . $method,
//        CURLOPT_POSTFIELDS => json_encode($data),
//        CURLOPT_HTTPHEADER => array_merge(array("Content-Type: application/json"))
//    ]);
//    $result = curl_exec($curl);
//    curl_close($curl);
//    return (json_decode($result, 1) ? json_decode($result, 1) : $result);
//}

