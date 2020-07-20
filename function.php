<?php
//===============================
//ログ
//===============================
ini_set('log_errors','on');
ini_set('error_log','php.log');
//===============================
//デバッグ
//===============================
$debug_flg = true;
//デバッグログ関数
function debug($str){
    global $debug_flg;
    if(!empty($debug_flg)){
        error_log('デバッグ:'.$str);
    }
}
//===============================

//サニタイズ関数
function h($str){
    return htmlspecialchars($str,ENT_QUOTES,'UTF-8');
}


?>
