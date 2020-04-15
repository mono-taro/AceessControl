<?php

require_once( __DIR__ . '/../../session.php');
admin_session();

//追加するメンバーの内容を確認するページ
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
    $name=$_POST['name'];
    $idm=$_POST['idm'];

    //サニタイズ処理
    $name=htmlspecialchars($name,ENT_QUOTES,'UTF-8');
    $idm=htmlspecialchars($idm,ENT_QUOTES,'UTF-8');


    if($name==""){
        ?>
        <br/><br/><p>登録エラー<br/>名前が入力されていません</p>
        <br/><br/>
        <form>
        <a href="/pasori/admin/member_branch/member_add.php"><button type="button" class="btn btn-primary">戻る</button></a>
        </form>
        <?php
    }elseif($idm==''){
        ?>
        <br/><br/><p>登録エラー<br/>もう一度試してください</p>
        <br/><br/>
        <form>
        <a href="/pasori/admin/member_branch/member_add.php"><button type="button" class="btn btn-primary">戻る</button></a>
        </form>
        <?php
    }else{
        print "<br/><br/><h2>".$name."さん。</h2>";
        ?>  
        <br/><h2>登録しますか？</h2><br/>
        <form method="post" action="member_add_done.php">
        <input type="hidden" name="name" value="<?php print $name; ?>">
        <input type="hidden" name="idm" value="<?php print $idm; ?>">
        <br/>
        <a href="/pasori/admin/member_branch/member_add.php"><button type="button"class="btn btn-primary" >戻る</button></a>
        <input type="submit" class="btn btn-primary" value="OK">
        </form>
        <?php
         
    }
    ?>
</div>
</body>
</html>
