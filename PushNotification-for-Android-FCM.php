<?php
function pushAndroid($deviceToken, $message){
$data = array('post_title'=>$message);
$target = $deviceToken;//single Token
$url = 'https://fcm.googleapis.com/fcm/send';
//api_key available in Firebase Console -> Project Settings -> CLOUD MESSAGING -> Server key
$server_key = 'AAAAjMrKpeA:APA91bHrLVI1XHRSyD3BYx6v5kE0EIRp6nqFpCnk3HNXxF4VZJgQtnT150TAQ8dKfDmm765JkR4DcuBHPhzK4yDdyxU1zp91DX9w01vOfelvEqJ3-nmLAKLHCaMCvypATQkWbwUUyImK';
   
$fields = array();
$fields['data'] = $data;
if(is_array($target)){
 $fields['registration_ids'] = $target;
}else{
 $fields['to'] = $target;
}
//header with content_type api key
$headers = array(
 'Content-Type:application/json',
  'Authorization:key='.$server_key
);
 //echo json_encode($fields);  
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
 die('FCM Send Error: ' . curl_error($ch));
}
curl_close($ch);
$record =  json_decode($result);
$success = $record->success;
 }