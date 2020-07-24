<?php
require('../function.php');
debug('「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「');
debug('商品分岐 「pro_branch.php');
debug('「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「');

if(isset($_POST['disp'])){
    debug('参照ボタンが押されました');
    if(!isset($_POST['procode'])){
        header('Location:pro_ng.php');
        exit();
    }
    $pro_code=$_POST['procode'];
    header('Location:pro_disp.php?procode='.$pro_code);
    exit();
}
if(isset($_POST['add'])==true){
    header('Location:pro_add.php');
    exit();
}
if(isset($_POST['edit'])==true){
    debug('修正ボタンが押されました');
    if(isset($_POST['procode'])==false){
        header('Location:pro_ng.php');
        exit();
    }
    $pro_code = $_POST['procode'];
    header('Location:pro_edit.php?procode='.$pro_code);//?pro_code=を飛び先で$_GET['staffcode']で受け取れる
    exit();//exit() プログラムの終了
}
if(isset($_POST['delete'])==true){
    debug('削除ボタンが押されました');
    if(isset($_POST['procode'])==false){
        header('Location:pro_ng.php');
        exit();
    }
    $pro_code = $_POST['procode'];
    header("Location:pro_delete.php?procode=".$pro_code);
    exit();
}
?>