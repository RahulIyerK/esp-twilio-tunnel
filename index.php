
<?php
  //espttpwd

  require 'vendor/autoload.php';

  echo ("<h2> ESP Twilio Tunnel Accepts HTTP GET requests from the ESP8266 module </h2>");
  echo ("<br>");
  echo ("<h3> The GET parameters are as follows: </h3>");
  echo ("<p> <i> account_sid </i> : Twilio account SID </p>");
  echo ("<p> <i> auth_token </i> : Twilio auth token </p>");
  echo ("<p> <i> twilio_number </i> : Twilio phone number </p>");
  echo ("<p> <i> destination_number </i> : Phone number to send messages to </p>");
  echo ("<p> <i> message </i> : Message to send </p>");
  echo ("<br>");

  //esp8266 twilio "tunnel"
  //accepts HTTP communications from an ESP8266 module and makes appropriate HTTPS connections to the Twilio MMS API
  //receive esp GET data

  $account_sid = $_GET["account_sid"]; //user's twilio account sid
  $auth_token = $_GET["auth_token"]; //user's twilio auth token
  $twilio_number = $_GET["twilio_number"]; //user's twilio number
  $destination_number = $_GET["destination_number"];
  $message = $_GET["message"]; //message to send over MMS

  if ((strlen($account_sid) > 0)&&(strlen($auth_token) > 0)&&(strlen($twilio_number) > 0)&&(strlen($destination_number) > 0)&&(strlen($message) > 0))
  {
    //send to twilio mms api

    //test
    //file_put_contents('message_log.html', "<p>". date("Y-m-d H:i:s") . " , " . $account_sid . " , " . $auth_token . " , " . $twilio_number . " , " . $destination_number . " , " . $message . "</p>");

    $client = new Services_Twilio($account_sid, $auth_token);
    $client->account->messages->create(array(
      "From" => "+1". $twilio_number,
      "To" => "+1". $destination_number,
      "Body" => $message));

    //header( 'Location: https://esptwiliotunnel.000webhostapp.com/message_log.html' ) ;
  }

?>
