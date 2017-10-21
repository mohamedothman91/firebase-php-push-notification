<?php 

 $msg = array
    (
            'body' 	=> 'Body  Of Notification',
            'title'	=> 'Title Of Notification',
                    'icon'	=> 'myicon',/*Default Icon*/
                    'sound' => 'mySound'/*Default sound*/
    );
$fields = array
        (
            'to'		=> $registrationIds,
            'notification'	=> $msg
        );

sendMessageThroughFCM($fields);

function sendMessageThroughFCM($fields)
{
    $url = 'https://fcm.googleapis.com/fcm/send';
    $headers = array(
        'Authorization: key=butyoukeythere',
        'Content-Type: application/json'
    );
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
$result = curl_exec($ch);
if ($result === FALSE) {
    die('Curl failed: ' . curl_error($ch));
}
curl_close($ch);
if($result){
     return $result;
}else{
     return false;
    
 }    
}