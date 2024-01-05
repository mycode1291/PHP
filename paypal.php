<?php
$curl = curl_init();
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_URL, 'https://api-3t.sandbox.paypal.com/nvp');
curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query(array(
    'USER' => 'mpsingh.inext-facilitator_api1.gmail.com',
    'PWD' => '1388391906',
    'SIGNATURE' => 'An5ns1Kso7MWUdW4ErQKJJJ4qi4-ADSgarJ8XHA8kiIRmvCoUKzLYQo5',
    'METHOD' => 'MassPay',
    'VERSION' => '99',
    'CURRENCYCODE' => 'USD',
    'RECEIVERTYPE' => 'EmailAddress',
    'EMAILSUBJECT' => 'Assunto do email que o cliente receberá',
    'L_EMAIL0' => 'test1@gmail.com',
    'L_AMT0' => 60.00,
    'L_EMAIL1' => 'test1@gmail.com',
    'L_AMT1' => 40.00

)));
$response = curl_exec($curl);
echo "<pre>";
print_r($response);
curl_close($curl);