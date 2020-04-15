<?php
require_once( __DIR__ . '/../../session.php');
admin_session();

//メンバー削除完了ページ
?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>Delete_Done</title>
</head>
<body>
<div class="mx-auto" style="width: 400px;">
  <?php
  try{

    require_once( __DIR__ . '/../../connect.php');
    $dbh = connectDB();

      //受け取ったデータを変数に代入
      $code=$_POST['code'];
      
      //データ削除
      $sql='DELETE from  member  WHERE code=?';   //SQL命令文 入れたいデータは「？」
      $stmt=$dbh->prepare($sql);    //準備する
      $data[]=$code;
      $stmt->execute($data);        //クエリの実行

      $dbh=null;                    //データーベースから切断

      
    }catch(Exception $e){           //例外処理
      print 'ただいま障害により大変ご迷惑をお掛けしております。';
      exit();
    }
  ?>

  <br/><br/>削除しました。<br/>
  <br/>
  <a href="/pasori/admin/member_list.php"><button type="button" class="btn btn-primary">戻る</button></a>
</div>

</body>
</html>
