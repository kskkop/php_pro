<?php
require('../function.php');
debug('「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「');
debug('「staff_edit_done.php');
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
$staff_code = $_POST['code'];
debug('$staff_code'.$staff_code);
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



$dbh=new PDO($dsn,$user,$password);

$sql = 'DELETE FROM mst_staff WHERE code = ?';//$staff_codeのレコードを削除
$data[] = $staff_code;
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
削除しました<br><br>
<a href="staff_list.php"> 戻る</a>
</body>
</html>