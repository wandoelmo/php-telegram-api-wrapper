<?php
require_once("./include/config.php");
include("./include/functions.php");
include("./lib/telegrambot.class.php");

$success=false;

$telegram_id = post_parameter('chat_id');
if(!empty($telegram_id) && is_numeric($telegram_id)){
	$message = post_parameter('message');
	if(!empty($message)){
		$gigi = new TelegramBot(APP_TELEGRAM_SECRET_TOKEN_STRING);
		$gigi->sendMessage($message, $telegram_id);
		$success=true;
	}
}

if(!$success) {json_echo(array('status'=>0, message=>'Message sent.')); http_response_code(400);}
else		  {json_echo(array('status'=>1, message=>'Error on backend.')); http_response_code(200);}
?>