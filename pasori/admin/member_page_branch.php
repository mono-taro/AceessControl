<?php

require_once( __DIR__ . '/../session.php');
admin_session();


  if(isset($_POST['add'])==true){
    header('Location:member_branch/member_add.php');
    exit();
  }
  
  if(isset($_POST['edit'])==true){
    if(isset($_POST['code'])==false){
      header('Location:not_select.php');
      exit();
    }
    $code=$_POST['code'];
    header('Location:member_branch/member_edit.php?code='.$code);
    exit();
  }
  if(isset($_POST['delete'])==true){
    if(isset($_POST['code'])==false){
      header('Location:not_select.php');
      exit();
    }
    $code=$_POST['code'];
    header('Location:member_branch/member_delete.php?code='.$code);
    exit();
  }
?>
