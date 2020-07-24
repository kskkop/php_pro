<?php

//共通変数、共通関数読み込み
require('../function.php');
debug('「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「');
debug('pro_edit_check.php「商品修正確認ページ');
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
<?php
    //ポスト送信された値を変数に格納
    $pro_code = $_POST['code'];
    $pro_name = $_POST['name'];
    $pro_price = $_POST['price'];
    
    //サニタイズ
    $pro_name = sanitize($pro_name);
    $pro_price = sanitize($pro_price);

    if(empty($pro_name)){
        print '商品修正名が入力されていません<br>';
    }else{
        print '商品修正名：'.$pro_name.'<br>';
    }
    if(empty($pro_price)){
        print '商品修正価格が入力されていません';
    }else{
        print '商品価格:'.$pro_price.'<br>';

    }
    debug('商品ID'.$pro_code);
    debug('商品修正名'.$pro_name);
    debug('商品価格'.$pro_price);
?>
<body>
<?php
    if(empty($pro_name) || empty($pro_price)){
?>
<form>
    <input type="button" onclick="history.back()" value="戻る">
</form>
<?php
    }else{
?>
<form method="post" action="pro_edit_done.php">
    <input type="hidden" name="code" value="<?php echo $pro_code; ?>">
    <input type="hidden" name="name" value="<?php echo $pro_name;?>"><!--hidden 画面に表示されない非表示データを送信することができる-->
    <input type="hidden" name="price" value="<?php echo $pro_price;?>">
    <br>
    <input type="button" onclick="history.back()" value="戻る">
    <input type="submit" value="OK">
</form>
<?php
}
?>
</body>
</html>