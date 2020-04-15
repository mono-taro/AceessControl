<?php
require_once( __DIR__ . '/../../session.php');
admin_session();
require_once( __DIR__ . '/../../connect.php');
$dbh = connectDB();

//メンバー削除ページ
?>


<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>delete</title>
</head>
<body>
<div class="mx-auto" style="width: 400px;"> 
    <?php
      try{



        $code=$_GET['code'];

        $sql='SELECT name FROM member WHERE code = ?';   //削除するメンバーをメンバーコードで絞り込み
        $stmt=$dbh->prepare($sql);
        $data[]=$code;
        $stmt->execute($data);

        $rec=$stmt->fetch(PDO::FETCH_ASSOC);
        $name=$rec['name'];

        $dph=null;

      }catch(Exception $e){
        print 'ただいま障害により大変ご迷惑をお掛けしております。';
        exit();
      }
    ?>

  <br/><br/><h2>メンバー削除</h2><br/>
  <br/>
  メンバーコード<br/>
  <?php print $code; ?>
  <br/>
  メンバー名<br/>
  <?php print $name; ?>
  <br/>
  このメンバーを削除してよろしいですか？<br/>
  <br/>
  <form method="post" action="member_delete_done.php">
    <input type="hidden" name="code" class="btn btn-primary" value="<?php print $code;?>">

    <!--前のページに戻るボタン-->
    <input type="button" class="btn btn-primary" onclick="history.back()" value="戻る"> 
    <input type="submit" class="btn btn-primary" value="OK">
  </form>

</div>
</body>

</html>


