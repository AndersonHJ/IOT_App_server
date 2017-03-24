<?php
/**
 * Represents a service, will registers callback functions through stream.php to handle the messages and acknowledgements when the messages arrive.
 * Replace sender_id and api_key below with credentials obtained from Firebase Console.
 *
 * @package FCMStream
 */

require __DIR__."/stream.php";


$service = new FCMStream([
		'sender_id' => '374511459407',
		'api_key' => 'AAAAVzKfXE8:APA91bH3QmkWRThjKTGtfBZGucn4ckSlUZUHXcQD8BP1IQRwaJ4AU48VRRKdPXYJsvoQu9kaRvyDFpTZa7ApQdb9k3JXXsnVqjYcs1wWphptXJG2eNhmx67zAtHdmsBHfcmj4Ps28Ezq',
		'debug_file' => 'debug.txt',
		'onSend' => function ($message_id) {
			echo "Sent message #$message_id successfully.\n";
		},

		'onFail' => function ($message_id, $error, $description) {
			echo "Failed message #$message_id with $error ($description).\n";
		},

		'onExpire' => function ($old_token, $new_token) {
			if ($new_token)
				echo "Need to replace expired token $old_token with #$new_token\n";
			else
				echo "Need to forget invalid token $old_token\n";
		},

		'onReceiveMessage' => function ($client_token, $client_message_id, $client_message) {
			echo "Received message from $client_token | $client_message_id: $client_message->data.\n";
		}
	]);

$service->stream()

?>
