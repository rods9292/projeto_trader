<?php

require_once 'entity.php';
require_once 'uteis.php';

class controller {

    public static function get_value($coin, $method){

        $ret = connection::exec_get_dados($coin, $method);

        $ar = json_decode($ret, true);

        $maior_vl = $ar['ticker']['high'];
        $meno_vl = $ar['ticker']['low'];
        $qtd_negociacao = $ar['ticker']['vol'];
        $ultimo_preco = $ar['ticker']['last'];
        $maior_preco_oferta = $ar['ticker']['buy'];
        $menor_preco_oferta = $ar['ticker']['sell'];
        $data_hora = $ar['ticker']['date'];

        uteis::out('Maior valor ultimas 24 hrs = ', $maior_vl);
        uteis::out('Menor valor ultimas 24 hrs = ', $meno_vl);
        uteis::out('Quantidade negociações ultimas 24 hrs = ', $qtd_negociacao);
        uteis::out('Valor ultima negociação = ', $ultimo_preco);
        uteis::out('Data hora = ', date('m/d/Y H:i:s',$data_hora));

        return;

    }

    public static function list_coins(){
        
        $arr_coins = array(
        'AAVE'=>'Aave',
        'ACMFT'=>'Fan Token ASR',
        'ACORDO01'=>'None',
        'ALLFT'=>'BARFT',
        'AMFT'=>'BARFT',
        'ANKR'=>'ANKR',
        'ARGFT'=>'BARFT',
        'ASRFT'=>'Fan Token ASR',
        'ATMFT'=>'Fan Token ATM',
        'AXS'=>'Axie Infinity Shard',
        'BAL'=>'Balancer',
        'BAND'=>'Band Protocol',
        'BARFT'=>'BARFT',
        'BAT'=>'Basic Attention token',
        'BCH'=>'Bitcoin Cash',
        'BNT'=>'BANCOR',
        'BTC'=>'Bitcoin',
        'CAIFT'=>'Fan Token CAI',
        'CHZ'=>'Chiliz',
        'CITYFT'=>'BARFT',
        'COMP'=>'Compound',
        'CRV'=>'Curve',
        'DAI'=>'Dai',
        'DAL'=>'Balancer',
        'ENJ'=>'Enjin',
        'ETH'=>'Ethereum',
        'GALFT'=>'Fan Token GAL',
        'GRT'=>'The Graph',
        'IMOB01'=>'None',
        'IMOB02'=>'None',
        'JUVFT'=>'Fan Token JUV',
        'KNC'=>'Kyber Network',
        'LINK'=>'CHAINLINK',
        'LTC'=>'Litecoin',
        'MANA'=>'Decentraland',
        'MATIC'=>'Polygon',
        'MBCONS01'=>'Cota de Consórcio 01',
        'MBCONS02'=>'Cota de Consórcio 02',
        'MBFP01'=>'None',
        'MBFP02'=>'None',
        'MBFP03'=>'None',
        'MBFP04'=>'None',
        'MBFP05'=>'None',
        'MBPRK01'=>'Precatório MB SP01',
        'MBPRK02'=>'Precatório MB SP02',
        'MBPRK03'=>'Precatório MB BR03',
        'MBPRK04'=>'Precatório MB RJ04',
        'MBPRK05'=>'Fluxo de Pagamentos 5',
        'MBVASCO01'=>'MBVASCO01',
        'MCO2'=>'MCO2',
        'MKR'=>'Maker',
        'NAVIFT'=>'BARFT',
        'OGFT'=>'Fan Token ASR',
        'OMG'=>'Omg Network',
        'PAXG'=>'PAX Gold',
        'PFLFT'=>'BARFT',
        'PSGFT'=>'Fan Token PSG',
        'REI'=>'Ren',
        'REN'=>'Ren',
        'SAUBERFT'=>'BARFT',
        'SNX'=>'Synthetix',
        'SUSHI'=>'SushiSwap',
        'THFT'=>'BARFT',
        'UMA'=>'Uma',
        'UNI'=>'Uniswap',
        'USDC'=>'USD Coin',
        'WBTC'=>'Wrapped Bitcoin',
        'WBX'=>'WiBX',
        'XRP'=>'XRP',
        'YFI'=>'Yearn',
        'ZRX'=>'0x');
    }

    public static function list_method(){
        #ticker : resumo de operações executadas
        #orderbook : livro de negociações, ordens abertas de compra e venda
        #trades : histórico de operações executadas
    }
}
