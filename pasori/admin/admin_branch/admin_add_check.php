<?php

require_once( __DIR__ . '/../../session.php');
admin_session();

//追加する管理者の内容を確認する
?>


<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>check</title>
</head>
<body>
    
    <?php
    //データ受取
    $name=$_POST['name'];
    $pass=$_POST['pass'];
    $pass2=$_POST['pass2'];

    //サニタイズ処理
    $name=htmlspecialchars($name,ENT_QUOTES,'UTF-8');
    $pass=htmlspecialchars($pass,ENT_QUOTES,'UTF-8');
    $pass2=htmlspecialchars($pass2,ENT_QUOTES,'UTF-8');

    if($name==''){
        print'管理者名が入力されていません。<br/>';
    }
    
    if($pass!=$pass2){
        print'パスワードが一致しません。<br/>';
    }

    if($name==''||$pass==''||$pass!=$pass2){
        ?>
        <form>
        <input type="button"  class="btn btn-primary" onclick="history.back()" value="戻る">
        </form>
        <?php
    }else{
        //md5でパスワードを暗号化
        $pass=md5($pass);
        ?>
        
        <br/><br/>
        <div class="mx-auto" style="width: 200px;">
            <h4><?php print $name."さん"; ?></h4>
            <h4><br/>登録しますか？<br/><h4>
            <form method="post" action="admin_add_done.php">
                <input type="hidden" name="name" value="<?php print $name; ?>">
                <input type="hidden" name="pass" value="<?php print $pass; ?>">
                <br/>
                <input type="button"  class="btn btn-primary" onclick="history.back()" value="戻る">
                <input type="submit"  class="btn btn-primary" value="OK">
            </form>
        </div>
        <?php
         
    }
    ?>

</body>
</html>
