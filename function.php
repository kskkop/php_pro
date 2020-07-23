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
function sanitize($str){
    return htmlspecialchars($str,ENT_QUOTES,'UTF-8');
}

function queryPost($dbh,$sql,$data){
    //クエリー作成
    $stmt = $dbh->prepare($sql);
    //プレースホルダーに値をセットし、SQL文を実行
    if(!$stmt->execute($data)){
      debug('クエリに失敗しました。');
      debug('失敗したSQL：'.print_r($stmt,true));
      return 0;
    }
      debug('クエリ成功。');
      return $stmt;
  }
  
?>
