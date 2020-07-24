<?php
    require('../function.php');
    debug('「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「');
    debug('「商品詳細画面 pro_disp.php');
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
    try{
        $pro_code = $_GET['procode'];
        $dsn = 'mysql:dbname=shop;host=localhost;charset=utf8';
        $user = 'root';
        $password = 'root';
        $dbh = new PDO($dsn,$user,$password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
        $sql = 'SELECT name,price FROM mst_product WHERE code = :code';
        $stmt = $dbh->prepare($sql);
        $data = array(':code' => $pro_code);
        $stmt->execute($data);

        $rec = $stmt->fetch(PDO::FETCH_ASSOC);//1レコードの情報が配列で入っている
        $pro_name = $rec['name'];
        $pro_price = $rec['price'];

        $dbh = null;
    }catch(Exception $e){
        print 'ただいま障害により大変ご迷惑をおかけしております';
        exit();
    }
    ?>
    商品情報参照<br>
    <br>
    商品コード<br>
    <?php print $pro_code;?><br>
    商品名<br>
    <?php print $pro_name; ?><br>
    価格<br>
    <?php print $pro_price; ?>円<br>
    <br>
    <form>

        <input type="button" onclick="histrory.back()" value="戻る">
    </form>
</body>
</html>