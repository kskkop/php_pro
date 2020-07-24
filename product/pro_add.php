<?php
//共通変数、共通関数読み込み
require('../function.php');
debug('「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「');
debug('「商品追加ページ pro_add.php');
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
    商品追加<br><br>
    <form method="post" action="pro_add_check.php">
    商品名を入力してください<br>
    <input type="text" name="name" style="width: 200px;"><br>
    価格を入力してください<br>
    <input type="text" name="price" style="width: 100px;"><br>
    <br>
    <input type="button" onclick=history.back() value="戻る">
    <input type="submit" value="OK">
    </form>
</body>
</html>