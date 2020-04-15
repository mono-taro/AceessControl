

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<?php


require_once( __DIR__ . '/../connect.php');
$dbh = connectDB();

//admin_login.htmlで入力した値の確認
try{
  $name=$_POST['name'];
  $pass=$_POST['pass'];

  //サニタイズ処理
  $name=htmlspecialchars($name,ENT_QUOTES,'UTF-8');
  $pass=htmlspecialchars($pass,ENT_QUOTES,'UTF-8');

  $pass=md5($pass);      //MD5でハッシュ化
  
  



  
  $sql='SELECT name FROM staff WHERE name=? AND password=?';    //スタッフコードとパスワードで読み出し
  $stmt=$dbh->prepare($sql);
  $data[]=$name;
  $data[]=$pass;
  $stmt->execute($data);

  $dbh=null;

  $rec=$stmt->fetch(PDO::FETCH_ASSOC);

  print $rec;
  
  //データベースからデータが返って来なければスタッフコードかパスワードが間違えてる

  if($rec==false){
    ?>
    <div class="mx-auto" style="width: 400px;">
      <br/><br/>スタッフ名かパスワードが間違っています。<br/>
      <button class="btn btn-primary" onclick="history.back()">戻る</button>
    </div>
    <?php
  }else{
    session_start();
    $_SESSION['login']=1;
    $_SESSION['code']=$code;
    $_SESSION['name']=$rec['name'];
    header('Location:admin_top.php');
    exit();
  }
 
}catch(Exception $e){
  print 'ただいま障害により大変ご迷惑をお掛けしております。';
  exit();
}



?>
