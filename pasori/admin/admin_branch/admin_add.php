<?php

require_once( __DIR__ . '/../../session.php');
admin_session();

//管理者追加ページ
?>


<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>管理者追加</title>
</head>
<body>
<br/>
<div class="mx-auto" style="width: 400px;">
<h2>管理者追加</h2>
    <form method="post" action="admin_add_check.php">
        追加する管理者名を入力してください。<br/>
        <input type="text" name="name" style="width:250px" placeholder="管理者名"><br/><br/>
        パスワードを入力してください。<br/>
        <input type="password" name="pass" style="width:150px" placeholder="*****"><br/><br/>
        パスワードをもう一度入力してください。<br/>
        <input type="password" name="pass2" style="width:150px" placeholder="*****"><br/><br/>
        <br/>
        <input type="button"  class="btn btn-primary" onclick="history.back()" value="戻る">
        <input type="submit"  class="btn btn-primary" value="OK">
    </form>
</div>


    
</body>
</html>
