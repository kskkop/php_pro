<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<?php
    $staff_name = $_POST['name'];
    $staff_pass = $_POST['pass'];
    $staff_pass_re = $_POST['pass_re'];
    
    function h($str){
        return htmlspecialchars($str,ENT_QUOTES,'UTF-8');
    }
    $staff_name = h($staff_name);
    $staff_pass = h($staff_pass);
    $staff_pass_re = h($staff_pass_re); 
    if($staff_name == ''){
        print 'スタッフ名が入力されていません<br>';
    }else{
        print 'スタッフ名：'.$staff_name.'<br>';
    }
    if($staff_pass == ''){
        print 'パスワードが入力されていません<br>';
    }
    if($staff_pass !== $staff_pass_re){
        print 'パスワードが一致しません<br>';
    }
        
    var_dump($staff_name);

?>
<body>
<?php
    if($staff_name == '' || $staff_pass == '' || $staff_pass != $staff_pass_re){
?>
<form>
    <input type="button" onclick="history.back()" value="戻る">
</form>
<?php
    }else{
        $staff_pass = md5($staff_pass);
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