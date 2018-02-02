<?php

header("Access-Control-Allow-Origin: *");


if(!function_exists('qucreative_get_contents')){
    function qucreative_get_contents($url, $pargs = array()) {
        $margs = array(
            'force_file_get_contents' => 'off',
        );
        $margs = array_merge($margs, $pargs);



        global $wp_filesystem;
        $cache   = $wp_filesystem->get_contents( $url );
        
        return $cache;
    }
}

if ( isset ( $_GET["scurl"] )) {
    $aux =  qucreative_get_contents($_GET["scurl"]);


    $aux = json_decode($aux);
    
    if(is_object($aux)){
        $aux2 = qucreative_get_contents($aux->location);
        echo $aux2;
    }else{
        echo 'aux is not array ';
        print_r($aux);
    }
}
