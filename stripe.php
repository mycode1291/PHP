<?php
include ("function/config.php"); // For add, update, delete
include ("stripe/config.php");  // stripe account
try
 {

 $userId = trim($_POST['userId']);
 $tokenid = trim($_POST['token']);
 $amounts = trim($_POST['amount']);
 $frameId = trim($_POST['frameId']);
 $amount = $amounts * 100;
 
 $make_charge = \Stripe\Charge::create(array(
  "amount" => $amount,
  "currency" => "usd",
  "source" => $tokenid,
  "description" => "Charge by"
 ));
 
 $amount = $make_charge->amount;
 $status = $make_charge->status;
 $created = $make_charge->created;
 $created = date('Y-m-d H:i:s', $created);
 $transactionId = $make_charge->balance_transaction;
 if ($status == "succeeded")
  {
  $chargeId = $make_charge->id;
  $paid = $make_charge->paid;
  $tableName = "checkout";
  $insertArray = array(
   'userId' => $userId,
   'frameId' => $frameId,
   'paymentId' => $chargeId,
   'transactionId' => $transactionId,
   "amount" => $amounts,
   'created' => $created
  );
  $objDatabase->insert($tableName, $insertArray);
  $jsonResponse = array(
   "success" => 1,
   "message" => "Payment successfully done"
  );
  }
 }

catch(Exception $e)
 {
 
 $err_message = $e->getMessage();
 $jsonResponse = array(
  "success" => 0,
  "message" => $err_message
 );
 }

echo json_encode($jsonResponse);
?>