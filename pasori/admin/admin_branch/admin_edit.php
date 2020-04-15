<?php
require_once( __DIR__ . '/../../session.php');
admin_session();
?>



<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit</title>
</head>
<body>

    <?php
    //管理者内容修正ページ

      try{

        require_once( __DIR__ . '/../../connect.php');
        $dbh = connectDB();

        $code=$_GET['code'];

        $sql='SELECT name FROM staff WHERE code = ?';   //スタッフコードで絞り込み
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
  <div class="mx-auto" style="width: 400px;">
  <br/><br/><h2>管理者修正</h2><br/>
  <br/>
  スタッフコード<br/>
  <?php print $code; ?>
  <br/>
    <form method="post" action="admin_edit_check.php">
      <input type="hidden" name="code" value="<?php print $code;?>">
      スタッフ名<br/>

      <input type="text" name="name" style="width:200px" value="<?php print $name; ?>"><br/>

      パスワードを入力してください<br/>
      <input type="password" name="pass" style="width:100px"><br/>
      パスワードをもう一度入力してください。<br/>
      <input type="password" name="pass2" style="width:100px"><br/>

      <!--前のページに戻るボタン-->
      <input type="button" class="btn btn-primary" onclick="history.back()" value="戻る"> 
      <input type="submit" class="btn btn-primary" value="OK">
    </form>
  </div>

</body>

</html>


