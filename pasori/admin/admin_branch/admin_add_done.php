<?php

require_once( __DIR__ . '/../../session.php');
admin_session();

//管理者追加完了ページ
?>



<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>追加完了</title>
</head>

<body>
<?php
try{

  require_once( __DIR__ . '/../../connect.php');
  $dbh = connectDB();

    //受け取ったデータを変数に代入
    $name=$_POST['name'];
    $pass=$_POST['pass'];
    //サニタイズ処理
    $name=htmlspecialchars($name,ENT_QUOTES,'UTF-8');
    $pass=htmlspecialchars($pass,ENT_QUOTES,'UTF-8');


    $sql='INSERT INTO staff(name,password) VALUES (?,?)';   //SQL命令文 入れたいデータは「？」
    $stmt=$dbh->prepare($sql);    //準備する命令
    $data[]=$name;          //「?」にセットしたデータの書き出し
    $data[]=$pass;
    $stmt->execute($data);        //クエリの実行

    $dbh=null;                    //データーベースから切断

    ?>
    <br/><br/>
    <div class="mx-auto" style="width: 400px;">
      <?php print $name."さんを追加しました。";?>
      <br/><br/>
      <a href="/pasori/admin/admin_list.php"><button type="button" class="btn btn-primary" >戻る</button></a>
    </div>
  <?php
  }catch(Exception $e){           //例外処理
    print 'ただいま障害により大変ご迷惑をお掛けしております。';
    exit();
  }


?>


</body>
</html>
