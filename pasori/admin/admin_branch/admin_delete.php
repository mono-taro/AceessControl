<?php
require_once( __DIR__ . '/../../session.php');
admin_session();

//管理者削除ページ
?>


<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete</title>
</head>
<body>

    <?php
      try{

        require_once( __DIR__ . '/../../connect.php');
        $dbh = connectDB();

        $code=$_GET['code'];
        

        //スタッフコード1番のみ削除不可
        if($code==1){
            header('Location:ng.html');

        }

        $sql='SELECT name FROM staff WHERE code = ?';   //スタッフコードで絞り込み
        $stmt=$dbh->prepare($sql);
        $data[]=$code;
        $stmt->execute($data);

        $rec=$stmt->fetch(PDO::FETCH_ASSOC);
        $name=$rec['name'];                             //スタッフコードと対応する名前を取り出す

        $dph=null;

      }catch(Exception $e){
        print 'ただいま障害により大変ご迷惑をお掛けしております。';
        exit();
      }
    ?>
  <br/><br/>
  <div class="mx-auto" style="width: 400px;">
  <h2>管理者削除</h2><br/>
    <br/>
    管理者コード<br/>
    <?php print $code; ?>
    <br/>
    管理者名<br/>
    <?php print $name; ?>
    <br/>
    この管理者を削除してよろしいですか？<br/>
    <br/>
    <form method="post" action="admin_delete_done.php">
      <input type="hidden" name="code" value="<?php print $code;?>">

      <!--前のページに戻るボタン-->
      <input type="button" class="btn btn-primary" onclick="history.back()" value="戻る"> 
      <input type="submit" class="btn btn-primary" value="OK">
    </form>
  </div>

</body>

</html>


