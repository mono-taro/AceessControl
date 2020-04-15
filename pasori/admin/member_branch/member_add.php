<?php

require_once( __DIR__ . '/../../session.php');
admin_session();
//メンバー追加のページ
?>


<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>メンバー追加</title>
</head>
<body>
<div class="mx-auto" style="width: 400px;">    
    <br/><br/><h2>メンバー追加</h2><br/>
    <br/>
    <!--追加するメンバー名をmember_idm_read.phpに送る-->
    <form method="post" action="member_idm_read.php" >
        <!--ページを飛んだ先でどこから飛んできたのかtypeで判断-->
        <input type="hidden" name="type" value="add">
        メンバー名を入力してください。<br/>
        <input type="text" name="name" style="width:200px"><br/>

        <br/>
        <a href="/pasori/admin/member_list.php"><button type="button" class="btn btn-primary">戻る</button></a>
        <input type="submit" class="btn btn-primary" value="次へ">
    </form>
</div>    
</body>
</html>
