<?php

//共通変数、共通関数読み込み
require('../function.php');
debug('「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「');
debug('「商品追加確認ページ pro_add_check.php');
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
    $pro_name = $_POST['name'];
    $pro_price = $_POST['price'];
    
    //サニタイズ
    $pro_name = sanitize($pro_name);

    if(empty($pro_name)){
        print '商品名が入力されていません<br>';
    }else{
        print '商品名：'.$pro_name.'<br>';
    }
    if(empty($pro_price)){
        print '価格が入力されていません<br>';
    }elseif(!preg_match('/^[0-9]+$/',$pro_price)){
        print '半角数字で入力してください';
    }else{
        print '価格:';
        print $pro_price;
        print '円 <br>';
    }
        
    debug('商品名'.$pro_name);
    debug('価格'.$pro_price);

?>
<body>
<?php
    if(empty($pro_name) || !preg_match('/^[0-9]+$/',$pro_price)){
?>
<form>
    <input type="button" onclick="history.back()" value="戻る">
</form>
<?php
    }else{
?>
<form method="post" action="pro_add_done.php">
    <input type="hidden" name="name" value="<?php echo $pro_name; ?>">
    <input type="hidden" name="price" value="<?php echo $pro_price; ?>">
    <br>
    <input type="button" onclick="history.back()" value="戻る">
    <input type="submit" value="OK">
</form>
<?php
}
?>
</body>
</html>