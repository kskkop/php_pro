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
    require('../function.php');
    debug('「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「');
    debug('「商品編集画面 pro_edit.php');
    debug('「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「');

    try{
        $pro_code = $_GET['procode'];
        $dsn = 'mysql:dbname=shop;host=localhost;charset=utf8';
        $user = 'root';
        $password = 'root';
        $dbh = new PDO($dsn,$user,$password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
        $sql = 'SELECT name,price FROM mst_product WHERE code = :code';//該当のcodeを探してnameとpriceを取得
        $stmt = $dbh->prepare($sql);
        $data = array(':code' => $pro_code);
        $stmt->execute($data);

        $rec = $stmt->fetch(PDO::FETCH_ASSOC);
        $pro_name = $rec['name'];
        $pro_price = $rec['price'];

        $dbh = null;
    }catch(Exception $e){
        print 'ただいま障害により大変ご迷惑をおかけしております';
        exit();
    }
    ?>
    商品修正<br>
    <br>
    商品コード<br>
    <?php
    print $pro_code;
    ?>
    <br>
    <br>
    <form method = "post" action="pro_edit_check.php">
        <input type="hidden" name="code" value="<?php print $pro_code;?>"><!--valueにpost送信された値を保持 hiddenで隠す-->
        商品名<br>
        <input type="text" name="name" style="width: 200px;" value="<?php print $pro_name; ?>"><br>
        価格
        <input type="text" name="price" style="width:50px;" value="<?php print $pro_price; ?>">円
        <br>
        <input type="button" onclick="histrory.back()" value="戻る">
        <input type="submit" value="OK">
    </form>
</body>
</html>