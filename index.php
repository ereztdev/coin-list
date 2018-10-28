<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');


ini_set('xdebug.var_display_max_depth', 7);
ini_set('xdebug.var_display_max_children', 256);
ini_set('xdebug.var_display_max_data', 1024);


function eth_rpc($method, $params = [])
{

    $conf = new stdClass();

    $conf->username = 'antonm';
    $conf->password = 'secret';
    $conf->proto = 'http';
    $conf->host = 'localhost';
    $conf->port = 8545;
    $conf->url = null;


    $res_status = null;
    $res_error = null;
    $res_raw_response = null;
    $res_response = null;


    $request = json_encode([
        "jsonrpc" => "2.0",
        'method'  => $method,
        'params'  => $params,
        'id'      => 0,
    ]);


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


//$w = eth_rpc('personal_newAccount', ['h4ck3r']);
$w = eth_rpc('personal_listAccounts');
//$w = eth_rpc('eth_getBalance',
//    [
//        '0xa016009709232cd5beb8902700cd6a2fb11ea9c25fb21f1cef59087ae6866e91',
//        'latest'
//    ]);

$w = eth_rpc('eth_blockNumber');
/*



Aion

oASGeh66XN40Rz


0xa0190b20c988f0d86bd319e5362190c9573984627cd2d77f03867cce3042afb4








 */


//eth_rpc('eth_getBalance', [
//    '0x25c1bb4fa5532ca5cd68340e6133e7158a354f15',
//    'latest']);
////eth_rpc('getreceivedbyaddress', ['QQqzYBRRuAgWGnz8kWbW9BhadXZurUEbsc']);
//eth_rpc('getreceivedbyaddress', ['2MviWqKMYqynGC4sY5g9onhXpbueYWcUfPJ']);


//$tt = eth_rpc('gettransaction', ['3052f93347df874a09ca6a95840a17d684abc062558c8ec6cf64b2b4e98589a6']);
//eth_rpc('sendrawtransaction', [$tt['hex']]);


//eth_rpc('sendtoaddress', ['2MviWqKMYqynGC4sY5g9onhXpbueYWcUfPJ', 0.001]);


/*

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
