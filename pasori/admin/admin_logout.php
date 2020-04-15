<?php
  session_start();
  $_SESSION=array();
  if(isset($_COKKIE[session_name()])==true){
    setcookie(session_name(),'',time()-42000,'/');
  }  
  session_destroy();
?>


<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>ログアウト</title>
</head>
<body>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<div class="mx-auto" style="width: 600px;">
  <br/><br/>
  <h4>ログアウトしました。</h4>
  <br/>
  <br/>
  <a href="admin_login.html"><button type="button" class="btn btn-primary" >ログイン</button></a>
  <a href="/pasori/member.php"><button type="button" class="btn btn-primary" >メンバー在否</button></a>
  <a href="/pasori/top.html"><button type="button" class="btn btn-primary" >カード読み取り</button></a>
</div>
</body>
</html>
