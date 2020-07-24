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
    debug('「staff_edit.php');
    debug('「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「');

    try{
        $staff_code = $_GET['staffcode'];
        $dsn = 'mysql:dbname=shop;host=localhost;charset=utf8';
        $user = 'root';
        $password = 'root';
        $dbh = new PDO($dsn,$user,$password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
        $sql = 'SELECT name FROM mst_staff WHERE code = :code';
        $stmt = $dbh->prepare($sql);
        $data = array(':code' => $staff_code);
        $stmt->execute($data);

        $rec = $stmt->fetch(PDO::FETCH_ASSOC);
        $staff_name = $rec['name'];

        $dbh = null;
    }catch(Exception $e){
        print 'ただいま障害により大変ご迷惑をおかけしております';
        exit();
    }
    ?>
    スタッフ情報参照<br>
    <br>
    スタッフコード<br>
    <?php print $staff_code;?>
    スタッフ名
    <?php print $staff_name; ?>
    <br>
    <br>
    <form>

        <input type="button" onclick="histrory.back()" value="戻る">
    </form>
</body>
</html>