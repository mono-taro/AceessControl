<?php

require_once( __DIR__ . '/../../session.php');
admin_session();

//メンバーの追加完了
?>



<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>追加完了</title>
</head>

<body>
<div class="mx-auto" style="width: 400px;"> 
  <?php
  try{

    require_once( __DIR__ . '/../../connect.php');
    $dbh = connectDB();

      //受け取ったデータを変数に代入
      $name=$_POST['name'];
      $idm=$_POST['idm'];
      //サニタイジング
      $name=htmlspecialchars($name,ENT_QUOTES,'UTF-8');
      $idm=htmlspecialchars($idm,ENT_QUOTES,'UTF-8');


      $sql='INSERT INTO member(name,idm) VALUES (?,?)';   //SQL命令文 入れたいデータは「？」
      $stmt=$dbh->prepare($sql);    //準備する命令
      $data[]=$name;          //「?」にセットしたデータの書き出し
      $data[]=$idm;
      $stmt->execute($data);        //クエリの実行

      $dbh=null;                    //データーベースから切断


      print '<br/><br/>'.$name;
      print "さんを追加しました。<br/>";
    }catch(Exception $e){           //例外処理
      print 'ただいま障害により大変ご迷惑をお掛けしております。';
      exit();
    }


  ?>

  <a href="/pasori/admin/member_list.php"><button type="button" class="btn btn-primary" >戻る</button></a>
</div>
</body>
</html>
