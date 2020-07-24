<?php
require('../function.php');
debug('「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「');
debug('「商品一覧ページ pro_list.php');
debug('「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「');

try{
    $dsn = 'mysql:dbname=shop;host=localhost;charset=utf8';
    $user = 'root';
    $password = 'root';

    $dbh = new PDO($dsn,$user,$password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    $sql = 'SELECT code,name,price FROM mst_product WHERE 1';//nameカラムの全てのデータをくれ
    $stmt = $dbh->prepare($sql);
    $stmt->execute();//nameの全てのデータが$stmtに入っている
    $dbh=null;

    /*
    print('商品一覧'.'<br><br>');
    print('<form method = "post" action = "pro_branch.php">');
    while(true){
        $rec = $stmt->fetch(PDO::FETCH_ASSOC);//$stmtから１レコード取り出し
        if($rec == false){
        break;
        }
        print '<input type="radio" name="procode" value="'.$rec['code'].'">';
        print $rec['name'].'---';
        print $rec['price'].'円';
        print '<br>';
    }
    
    print '<input type = submit name="disp" value="参照">';
    print '<input type=submit name="add" value="追加">';
    print '<input type="submit" name="edit" value="修正">';
    print '<input type="submit" name="delete" value="削除">';
    print '<br>';
    */


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
    商品一覧<br><br>
    <form method="post" type="radio" name="procode" action="pro_branch.php">
        <?php
        while(true){
            $rec = $stmt->fetch(PDO::FETCH_ASSOC);
            if($rec == false){
            break;
            }
        ?>
        <input type="radio" name="procode" value="<?php echo $rec['code']; ?>">
        <?php
        echo $rec['name'].'---';
        echo $rec['price'].'円';
        echo '<br>';
        }//while
        ?>
        <input type="submit" name="disp" value="参照">
        <input type="submit" name="add" value="追加">
        <input type="submit" name="edit" value="修正">
        <input type="submit" name="delete" value="削除">
        <br>
    </form>
</body>
</html>