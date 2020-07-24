<?php
require('../function.php');
debug('「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「');
debug('「商品追加ページ pro_add_done.php');
debug('「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「');

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
try
{

    $pro_name = $_POST['name'];
    $pro_price = $_POST['price'];


    $dsn='mysql:dbname=shop;host=localhost;charset=utf8';
    $user='root';
    $password='root';
    $options = array(
        //SQL実行時にはエラーコードのみ設定
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        //デフォルトフェッチモードを連想配列に設定
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        //バッファードクエリを使う（一度に結果セットを全て取得し、サーバー負荷を軽減）
        //SELECTで得た結果に対してもrowCountメソッドを使えるようにする
        PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true,
    );

    debug('デバッグ'.$pro_name);
    debug('デバッグ'.$pro_price);

    $dbh=new PDO($dsn,$user,$password);
    $sql='INSERT INTO mst_product (name,price) VALUES (:p_name,:price)';//gazouカラムのデフォルト値をNULLにしたら成功
    $data = array(':p_name' => $pro_name,':price' => $pro_price);
    queryPost($dbh,$sql,$data);
    debug($sql);
    $dbh=null;

    print $pro_name;
    print 'を追加しました。<br />';

}
catch (Exception $e)
{
	print 'ただいま障害により大変ご迷惑をお掛けしております。';
	exit();
}

?>

<a href="pro_list.php"> 戻る</a>
</body>
</html>