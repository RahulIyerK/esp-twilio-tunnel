<?php
//espttpwd
//esp8266 twilio "tunnel"
//accepts HTTP communications from an ESP8266 module and makes appropriate connections to the Twilio MMS API
//receive esp post data
$uid = $_POST["uid"]; //twilio account uid
$pwd = $_POST["pwd"]; //twilio account password
$message = $_POST["message"]; //message to send over MMS

//send to twilio mms api

//test
file_put_contents('message.html', $message);

?>
