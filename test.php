<?php

$curl = curl_init();

$cookieFile = "cookie.txt";

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://logincentral.minsa.gob.pe',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  //CURLOPT_VERBOSE => false,
  CURLOPT_FOLLOWLOCATION=>true,
  CURLOPT_AUTOREFERER=>true,
  CURLOPT_REFERER=>'http://logincentral.minsa.gob.pe/',
  CURLOPT_COOKIEFILE=> $cookieFile, // Cookie aware
  CURLOPT_COOKIEJAR=> $cookieFile, // Cookie aware
  CURLOPT_COOKIESESSION=>true,
  CURLOPT_COOKIE => 'ga=GA1.3.294869810.1631755658; csrftoken=Mmbqc0RAir2Ubpfh91Wy8FQaGFhSC1mewamsGVLnDJ8MSKHrS1ILdOWNYrQG8R7O; sessionid=eyJ1c2VybmFtZSI6IiIsImFwcF9pZGVudGlmaWVyIjoiIiwibG9naW5fdXVpZCI6IiJ9:1oC4yn:mA_miF5UYXeccn5PoUuYAs_u-BpKxy-aauGXmIWs5iE',

  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_HEADER => true,
  CURLOPT_SSL_VERIFYPEER => false,
  CURLOPT_USERAGENT => "Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.2 (KHTML, like Gecko) Chrome/62.0.3202.94 Safari/537.2",
  CURLOPT_POST=>true,
  CURLOPT_POSTFIELDS => 'username=42247735&password=diris2021&csrfmiddlewaretoken=Mmbqc0RAir2Ubpfh91Wy8FQaGFhSC1mewamsGVLnDJ8MSKHrS1ILdOWNYrQG8R7O&app_identifier=&login_uuid=',
  CURLOPT_HTTPHEADER => array(
    'User-Agent: Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; rv:102.0) Gecko/20100101 Firefox/102.0',
    'Host: logincentral.minsa.gob.pe',
    'Referer: http://logincentral.minsa.gob.pe/',
    'Cookie: ga=GA1.3.294869810.1631755658; csrftoken=Mmbqc0RAir2Ubpfh91Wy8FQaGFhSC1mewamsGVLnDJ8MSKHrS1ILdOWNYrQG8R7O; sessionid=eyJ1c2VybmFtZSI6IiIsImFwcF9pZGVudGlmaWVyIjoiIiwibG9naW5fdXVpZCI6IiJ9:1oC4yn:mA_miF5UYXeccn5PoUuYAs_u-BpKxy-aauGXmIWs5iE',
    'Content-Type: application/x-www-form-urlencoded'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;


