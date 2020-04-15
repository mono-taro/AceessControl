<?php

require_once( __DIR__ . '/../../session.php');
admin_session();

//メンバー登録内容修正完了
?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>Edit_Done</title>
</head>
<body>
<div class="mx-auto" style="width: 400px;">
  <?php
  try{
    require_once( __DIR__ . '/../../connect.php');
    

      //受け取ったデータを変数に代入
      $code=$_POST['code'];
      $name=$_POST['name'];
      $idm=$_POST['idm'];
      //サニタイジング
      $name=htmlspecialchars($name,ENT_QUOTES,'UTF-8');
      $idm=htmlspecialchars($idm,ENT_QUOTES,'UTF-8');
      

      $dbh = connectDB();
      //データ変更
      $sql='UPDATE member SET name=?,idm=? WHERE code=?';   //SQL命令文 入れたいデータは「？」
      $stmt=$dbh->prepare($sql);    //準備する命令
      $data[]=$name;          //「?」にセットしたデータの書き出し
      $data[]=$idm;
      $data[]=$code;
      $stmt->execute($data);        //クエリの実行

      $dbh=null;                    //データーベースから切断

      
    }catch(Exception $e){           //例外処理
      print 'ただいま障害により大変ご迷惑をお掛けしております。';
      exit();
    }
  ?>

  <br/><br/>修正しました。<br/>
  <br/>

  <a href="/pasori/admin/member_list.php"><button type="button" class="btn btn-primary" >戻る</button></a>

</div>

</body>
</html>
