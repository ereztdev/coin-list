<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');


ini_set('xdebug.var_display_max_depth', 7);
ini_set('xdebug.var_display_max_children', 256);
ini_set('xdebug.var_display_max_data', 1024);
//ini_set('html_errors', false);


function xrp_rpc($method, $params = null)
{

$conf = new stdClass();

$conf->username = 'antonm';
$conf->password = 'opkQo7kx';
$conf->proto = 'http';
$conf->host = 'localhost';
$conf->port = 5005;
$conf->url = null;


$res_status = null;
$res_error = null;
$res_raw_response = null;
$res_response = null;


$request = json_encode([
'method' => $method,
'params' => [$params],
], JSON_PRETTY_PRINT);


var_dump($request);


$curl = curl_init("{$conf->proto}://{$conf->username}:{$conf->password}@{$conf->host}:{$conf->port}/{$conf->url}");
$options = [
CURLOPT_RETURNTRANSFER => true,
CURLOPT_FOLLOWLOCATION => true,
CURLOPT_MAXREDIRS      => 10,
CURLOPT_HTTPHEADER     => ['Content-type: application/json'],
CURLOPT_POST           => true,
CURLOPT_POSTFIELDS     => $request,
];
curl_setopt_array($curl, $options);

$res_raw_response = curl_exec($curl);
$res_response = json_decode($res_raw_response, true);

$res_status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

$curl_error = curl_error($curl);

curl_close($curl);

if (!empty($curl_error)) {
$res_error = $curl_error;
}


if (isset($res_response['error'])) {
$res_error = $res_response['error']['message'];
} elseif ($res_status != 200) {
switch ($res_status) {
case 400:
$res_error = 'HTTP_BAD_REQUEST';
break;
case 401:
$res_error = 'HTTP_UNAUTHORIZED';
break;
case 403:
$res_error = 'HTTP_FORBIDDEN';
break;
case 404:
$res_error = 'HTTP_NOT_FOUND';
break;
}
}


echo '$res_status: ';
var_dump($res_status);
echo '$res_error: ';
var_dump($res_error);
echo '$res_raw_response: ';
var_dump($res_raw_response);
echo '$res_response: ';
var_dump($res_response);
echo '<hr>';


if ($res_error) {
return false;
} else {
return $res_response['result'];
}
}


function xrp_helper_api_sign($params)
{
$res_status = null;
$res_error = null;
$res_raw_response = null;
$res_response = null;

$request = json_encode($params);

var_dump($request);

$curl = curl_init("http://localhost:3000/sign");
$options = [
CURLOPT_RETURNTRANSFER => true,
CURLOPT_FOLLOWLOCATION => true,
CURLOPT_MAXREDIRS      => 10,
CURLOPT_HTTPHEADER     => ['Content-type: application/json'],
CURLOPT_POST           => true,
CURLOPT_POSTFIELDS     => $request,
];
curl_setopt_array($curl, $options);

$res_raw_response = curl_exec($curl);
$res_response = json_decode($res_raw_response, true);

$res_status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

$curl_error = curl_error($curl);

curl_close($curl);

if (!empty($curl_error)) {
$res_error = $curl_error;
}


if (isset($res_response['error'])) {
$res_error = $res_response['error']['message'];
} elseif ($res_status != 200) {
switch ($res_status) {
case 400:
$res_error = 'HTTP_BAD_REQUEST';
break;
case 401:
$res_error = 'HTTP_UNAUTHORIZED';
break;
case 403:
$res_error = 'HTTP_FORBIDDEN';
break;
case 404:
$res_error = 'HTTP_NOT_FOUND';
break;
}
}


echo '$res_status: ';
var_dump($res_status);
echo '$res_error: ';
var_dump($res_error);
echo '$res_raw_response: ';
var_dump($res_raw_response);
echo '$res_response: ';
var_dump($res_response);
echo '<hr>';


if ($res_error) {
return false;
} else {
return $res_response;
}


}



$account_info = xrp_rpc('account_info', [
'account' => 'rJQT69z73wPqQQCPCC1Lgc7qbXW4jaCFKD'
]);



$account_info = xrp_rpc('account_info', [
'account' => 'rUEnt93ZGtqBUbvErCnXSRsYWtKwHnB9a'
]);


die('@1');






$w = xrp_rpc('server_info');

$fee = $w['info']['validated_ledger']['base_fee_xrp'] * 1000 * 1000;

var_dump($fee);





$account_info = xrp_rpc('account_info', [
'account' => 'rJQT69z73wPqQQCPCC1Lgc7qbXW4jaCFKD'
]);





//var_dump( $w['info']['validated_ledger']['base_fee_xrp'] );

//
//xrp_rpc('getwalletinfo', []);
//xrp_rpc('getreceivedbyaddress', ['2MwoLmW1iT3ofuqToepn7V89zm76BcRMg88']);
//xrp_rpc('getreceivedbyaddress', ['2MviWqKMYqynGC4sY5g9onhXpbueYWcUfPJ']);


//$tt = xrp_rpc('gettransaction', ['3052f93347df874a09ca6a95840a17d684abc062558c8ec6cf64b2b4e98589a6']);
//xrp_rpc('sendrawtransaction', [$tt['hex']]);


//xrp_rpc('sendtoaddress', ['2MviWqKMYqynGC4sY5g9onhXpbueYWcUfPJ', 0.001]);


// 2MwoLmW1iT3ofuqToepn7V89zm76BcRMg88

// 2MviWqKMYqynGC4sY5g9onhXpbueYWcUfPJ


// 3052f93347df874a09ca6a95840a17d684abc062558c8ec6cf64b2b4e98589a6


$xrp_amount = 100;

$txParams = [
'TransactionType' => 'Payment',
'Account'         => 'rJQT69z73wPqQQCPCC1Lgc7qbXW4jaCFKD',
'Destination'     => 'rUEnt93ZGtqBUbvErCnXSRsYWtKwHnB9a',
'Amount'          => ($xrp_amount * 1000000) . '',
'Fee'             => $fee . '',

//    'LastLedgerSequence' =>  ,
'Sequence'           =>  $account_info['account_data']['Sequence'],
];


var_dump($txParams);


$txJSON = json_encode($txParams);

$secret = 'ssKZvc5xu6yCYQoW9nxjYUfBs4vmy';

$signed_tx = xrp_helper_api_sign([

"secret"  => $secret,
"tx_json" => $txParams,

]);


$w = xrp_rpc('submit', [
'tx_blob' => $signed_tx['signed_tx']['signedTransaction'],
]);





/*


# test account

Address
rJQT69z73wPqQQCPCC1Lgc7qbXW4jaCFKD

Secret
ssKZvc5xu6yCYQoW9nxjYUfBs4vmy

Balance
10,000 XRP




# test account 2

"account_id" : "rUEnt93ZGtqBUbvErCnXSRsYWtKwHnB9a",
"key_type" : "secp256k1",
"master_key" : "FLEW BLEW FIG DEAL DOT FIGS HELD JOT CORE AVOW CRAY NOD",

"master_seed" : "ssAqbsK2PZSb7XVRoqyvLkWprgUpG",
"master_seed_hex" : "59C4F6A7AC1D6496FFF670384F248B82",

"public_key" : "aBQBYNtJwZKgyFLDShKFcqwTQq2VtcvuydhNxRrUxUjiMSPzqy56",
"public_key_hex" : "0324FF764E0CEACAA646E5A2176665C193202A086CC6BDE94DE0773A17E912B976",







getnewaddress



$latest_id = $bitcoin->getblockcount();
$latest_hash = $bitcoin->getblockhash($latest_id);
$latest_t = $bitcoin->getblock($latest_hash);
$first_hash = $bitcoin->getblockhash($latest_id - 20);
$first_t = $bitcoin->getblock($first_hash);
$time_per_block = ceil(($latest_t['time'] - $first_t['time']) / 20);
$estimated_fee = $bitcoin->estimatefee(floor(1800/$time_per_block));




$transactions = $bitcoin->listtransactions('*',500);
getwalletinfo





$tt = $bitcoin->gettransaction($t['txid']);
$bitcoin->sendrawtransaction($tt['hex']);

