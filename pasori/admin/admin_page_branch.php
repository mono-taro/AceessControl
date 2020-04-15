<?php

require_once( __DIR__ . '/../session.php');
admin_session();

//admin_list.php選んだスタッフ・選択肢を受取
//飛び先のページ分岐
if(isset($_POST['add'])==true){
  header('Location:admin_branch/admin_add.php');
  exit();
}

if(isset($_POST['edit'])==true){
  if(isset($_POST['code'])==false){
    header('Location:not_select.php');
    exit();
  }
  $code=$_POST['code'];
  header('Location:admin_branch/admin_edit.php?code='.$code);
  exit();
}
if(isset($_POST['delete'])==true){
  if(isset($_POST['code'])==false){
    header('Location:not_select.php');
    exit();
  }
  $code=$_POST['code'];
  header('Location:admin_branch/admin_delete.php?code='.$code);
  exit();
}
?>
