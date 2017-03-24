<?php


include "GCMsender.php";

$apiKey = "AAAAVzKfXE8:APA91bH3QmkWRThjKTGtfBZGucn4ckSlUZUHXcQD8BP1IQRwaJ4AU48VRRKdPXYJsvoQu9kaRvyDFpTZa7ApQdb9k3JXXsnVqjYcs1wWphptXJG2eNhmx67zAtHdmsBHfcmj4Ps28Ezq";

#$apiKey = "AIzaSyACYSegZA74J7o-vCwzdJ3BvHoUW2_vWWs";

$devices = array(
	"eFgyLjs9_Ts:APA91bGflP_EergcZLuXAWHdZQ86IMqdZoYK_vWjcA1VtdOG74G8RfCyjGQXpBO4YRWZDjUh7SaFWMCjEWy6Mtp4xGIuyD1sLkxd2GUCMwunUcS4tu_HUFbJBDzTikjRr2qnVnvZEad5");

$message = $_GET["message"];


$messages = "GCM Test Message";
$an = new GCMPushMessage($apiKey);
$an->setDevices($devices);
$response = $an->send($message);
echo $response;

?>
