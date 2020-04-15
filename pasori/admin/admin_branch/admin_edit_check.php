<?php
require_once( __DIR__ . '/../../session.php');
admin_session();

//管理者修正内容の確認
?>


<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>check</title>
</head>
<body>
<div class="mx-auto" style="width: 400px;">
    <?php
    //データ受取
    $code=$_POST['code'];
    $name=$_POST['name'];
    $pass=$_POST['pass'];
    $pass2=$_POST['pass2'];

    //サニタイズ処理
    $name=htmlspecialchars($name,ENT_QUOTES,'UTF-8');
    $pass=htmlspecialchars($pass,ENT_QUOTES,'UTF-8');
    $pass2=htmlspecialchars($pass2,ENT_QUOTES,'UTF-8');

    if($name==''){
        print'<br/><br/>スタッフ名が入力されていません。<br/>';
    }else{
        print'<br/><br/>スタッフ名:';
        print $name;
        print'<br/>';
    }
    
    if($pass!=$pass2){
        print'<br/><Br/>パスワードが一致しません。<br/>';
    }
    if($pass==''){
        print'<br/><br/>パスワードが入力されていません。<br/>';
    }
    
    if($name==''||$pass==''||$pass!=$pass2){
        
        print'<from><input type="button" class="btn btn-primary" onclick="history.back()" value="戻る"></from>';
        
    }else{
        //md5でパスワードをハッシュ化
        $pass=md5($pass);

        print "<br/<br/><h2>".$name."さん。</h2>";
        ?>  
        
            <br/><br/>登録しますか？<br/>
            <form method="post" action="admin_edit_done.php">
                <input type="hidden" name="code" value="<?php print $code; ?>">
                <input type="hidden" name="name" value="<?php print $name; ?>">
                <input type="hidden" name="pass" value="<?php print $pass; ?>">
                <br/>
                <input type="button" class="btn btn-primary" onclick="history.back()" value="戻る">
                <input type="submit" class="btn btn-primary" value="OK">
            </form>

        <?php


    }
    ?>
</div>
</body>
</html>
