<?php

abstract class SMS {
    function send($phone, $message) {
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => "http://badev.lorbouor.org/api/v1/sms",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => "{\n  \"email\": \"2019@civagrihack.ci\",\n  \"password\": \"2019civagrihack\",\n  \"cellphone\": \"".$phone."\",\n  \"message_content\": \"".$message."\"\n}",
          CURLOPT_HTTPHEADER => array(
            "cache-control: no-cache",
            "content-type: application/json"
          ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
          //J'ai une erreur CURL
          //echo "cURL Error #:" . $err;
          //return false;
        } else {
          // Le message à bien été envoyé et donc je poursuis mon processus
          //return true;
        }
    }
}
