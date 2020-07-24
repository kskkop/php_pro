<?php
require('../function.php');
debug('「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「');
debug('「staff_branch.php');
debug('「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「');

if(isset($_POST['disp'])){
    if(!isset($_POST['staffcode'])){
        header('Location:staff_ng.php');
        exit();
    }
    $staff_code=$_POST['staffcode'];
    header('Location:staff_disp.php?staffcode='.$staff_code);
    exit();
}
if(isset($_POST['add'])==true){
    header('Location:staff_add.php');
    exit();
}
if(isset($_POST['edit'])==true){
    debug('修正ボタンが押されました');
    if(isset($_POST['staffcode'])==false){
        header('Location:staff_ng.php');
        exit();
    }
    $staff_code = $_POST['staffcode'];
    header("Location:staff_edit.php?staffcode=".$staff_code);//?staffcode=を飛び先で$_GET['staffcode']で受け取れる
    exit();//exit() プログラムの終了
}
if(isset($_POST['delete'])==true){
    debug('削除ボタンが押されました');
    if(isset($_POST['staffcode'])==false){
        header('Location:staff_ng.php');
        exit();
    }
    $staff_code = $_POST['staffcode'];
    header("Location:staff_delete.php?staffcode=".$staff_code);
    exit();
}
?>