<?php
require('function.php');
try{
    $dsn = 'mysql:dbname=shop;host=localhost;charset=utf8';
    $user = 'root';
    $password = 'root';
    $dbh = new PDO($dsn,$user,$password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    $sql = 'SELECT code,name FROM mst_staff WHERE 1';//nameカラムの全てのデータをくれ
    $stmt = $dbh->prepare($sql);
    $stmt->execute();//nameの全てのデータが$stmtに入っている

    $dbh = null;

    print('スタッフ一覧'.'<br><br>');
    print('<form method = "post" action = "staff_edit.php">');
    while(true){
        $rec = $stmt->fetch(PDO::FETCH_ASSOC);//$stmtから１レコード取り出し
        if($rec == false){
        break;
        }
        print '<input type="radio" name="staffcode" value="'.$rec['code'].'">';
        print $rec['name'];
        print '<br>';
    }
    

    print '<input type="submit" value="修正">';
    print '<br>';
    print '</form>';

  }catch(Exception $e){
      print 'ただいま障害により大変ご迷惑をおかけしております';
      exit();
}
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
    
</body>
</html>