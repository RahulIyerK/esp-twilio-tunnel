
<?php
  //espttpwd

  require 'vendor/autoload.php';

  echo ("ESP Twilio Tunnel Accepts HTTP GET requests from the ESP8266 module");

  //esp8266 twilio "tunnel"
  //accepts HTTP communications from an ESP8266 module and makes appropriate HTTPS connections to the Twilio MMS API
  //receive esp GET data

  $to_number = "+14085972465";

  $account_sid = $_GET["account_sid"]; //user's twilio account sid
  $auth_token = $_GET["auth_token"]; //user's twilio auth token
  $twilio_number = $_GET["twilio_number"]; //user's twilio number
  $message = $_GET["message"]; //message to send over MMS

  if ((strlen($account_sid) > 0)&&(strlen($auth_token) > 0)&&(strlen($twilio_number) > 0)&&(strlen($message) > 0))
  {
    //send to twilio mms api

    //test
    file_put_contents('message_log.html', "<p>". date("Y-m-d H:i:s") . " , " . $account_sid . " , " . $auth_token . " , " . $twilio_number . " , " . $message . "</p>");

    $client = new Services_Twilio($account_sid, $auth_token);
    $client->account->messages->create(array(
      "From" => "+1". $twilio_number,
      "To" => $to_number,
      "Body" => $message));

    header( 'Location: https://esptwiliotunnel.000webhostapp.com/message_log.html' ) ;
  }

?>
