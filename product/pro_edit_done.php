<?php
require('../function.php');
debug('「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「');
debug('商品修正実行画面「pro_edit_done.php');
debug('「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「');

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
try
{
$pro_code = $_POST['code'];
$pro_name=$_POST['name'];
$pro_price = $_POST['price'];

$pro_name=htmlspecialchars($pro_name,ENT_QUOTES,'UTF-8');
$pro_price=htmlspecialchars($pro_price,ENT_QUOTES,'UTF-8');
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

$sql='UPDATE mst_product SET name = :u_name, price = :price WHERE code = :code';
$data = array(':u_name' => $pro_name,':price' => $pro_price,':code' => $pro_code);
queryPost($dbh,$sql,$data);
debug($sql);
$dbh=null;
}
catch (Exception $e)
{
	print 'ただいま障害により大変ご迷惑をお掛けしております。';
	exit();
}

?>
修正しました<br><br>
<a href="pro_list.php"> 戻る</a>
</body>
</html>