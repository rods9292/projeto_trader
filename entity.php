<?php

class connection {

    public static function exec_get_negociacao($data){

        $id = '31f5fa0c53a3bcbf9ce1c94d74888dcf';
        #$url_negociacao = 'https://www.mercadobitcoin.net/tapi/v3/?';
        $url_negociacao = '/tapi/v3/?';

        $method = $data['method'];
        $tapi_nonce = $data['tapi_nonce'];

        $url = $url_negociacao.'tapi_method='.$method.'&tapi_nonce='.$tapi_nonce;

        $tapi_mac = hash_hmac('sha512',  $url, $id);

        #$header = array();
        #$headers['Content-Type'] = 
        #    'Content-Type': 'application/x-www-form-urlencoded',
        #    'TAPI-ID': MB_TAPI_ID,
        #    'TAPI-MAC': tapi_mac
        #}

        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => $url,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          #CURLOPT_POSTFIELDS => $json_body,
          CURLOPT_HTTPHEADER => array(
            'Content-Type: application/x-www-form-urlencoded',
            'TAPI-ID: '.$id,
            'TAPI-MAC:'.$tapi_mac
          ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;
    }

    public static function exec_get_dados($coin, $method){

        $url_dados = "https://www.mercadobitcoin.net/api/".$coin."/".$method."/";

        echo "\n URL DADOS = ".$url_dados;
        echo "\n";

        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => $url_dados,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'GET'
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        return $response;
    }
}