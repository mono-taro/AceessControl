<?php
require_once( __DIR__ . '/../../session.php');
admin_session();

//メンバー登録内容修正ページ
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit</title>
</head>
<body>
<div class="mx-auto" style="width: 400px;">
    <?php
      try{

        require_once( __DIR__ . '/../../connect.php');
        $dbh = connectDB();

        $code=$_GET['code'];

        $sql='SELECT name FROM member WHERE code = ?';   //スタッフコードで絞り込み
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

  <br/><br/><h2>メンバー修正</h2><br/>
  <br/>
  メンバーコード<br/>
  <?php print $code; ?>
  <br/>
  <br/>
  <!--登録内容修正するメンバーコードと新しいメンバー名をmember_idm_read.phpに送る-->
  <form method="post" action="member_idm_read.php">
    <!--ページを飛んだ先でどこから飛んできたのかtypeで判断-->
    <input type="hidden" name="type" value="edit">
    <input type="hidden" name="code" value="<?php print $code;?>">
    メンバー名<br/>
    <input type="text" name="name" style="width:200px" value="<?php print $name; ?>"><br/>
    <!--前のページに戻るボタン-->
    <input type="button" class="btn btn-primary" onclick="history.back()" value="戻る"> 
    <input type="submit" class="btn btn-primary" value="OK">
  </form>
</div>

</body>

</html>


