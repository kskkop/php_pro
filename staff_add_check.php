<?php

//共通変数、共通関数読み込み
require('function.php');
debug('「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「');
debug('「スタッフ確認ページ');
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
    $staff_name = $_POST['name'];
    $staff_pass = $_POST['pass'];
    $staff_pass_re = $_POST['pass_re'];
    
    //サニタイズ
    $staff_name = h($staff_name);
    $staff_pass = h($staff_pass);
    $staff_pass_re = h($staff_pass_re);

    if(empty($staff_name)){
        print 'スタッフ名が入力されていません<br>';
    }else{
        print 'スタッフ名：'.$staff_name.'<br>';
    }
    if(empty($staff_pass)){
        print 'パスワードが入力されていません<br>';
    }
    if($staff_pass !== $staff_pass_re){
        print 'パスワードが一致しません<br>';
    }
        
    debug('スタッフ名'.$staff_name);
    debug('パスワード'.$staff_pass);
    debug('パスワード再入力'.$staff_pass_re);

?>
<body>
<?php
    if(empty($staff_name) || empty($staff_pass) || $staff_pass != $staff_pass_re){
?>
<form>
    <input type="button" onclick="history.back()" value="戻る">
</form>
<?php
    }else{
        $staff_pass = password_hash($staff_pass,PASSWORD_DEFAULT);
?>
<form method="post" action="staff_add_done.php">
    <input type="hidden" name="name" value="'.$staff_name.'">
    <input type="hidden" name="pass" value="'.$staff_pass.'">
    <br>
    <input type="button" onclick="history.back()" value="戻る">
    <input type="submit" value="OK">
</form>
<?php
}
?>
</body>
</html>