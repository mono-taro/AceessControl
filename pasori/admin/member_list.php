<?php
require_once( __DIR__ . '/../session.php');
admin_session();
require_once( __DIR__ . '/../connect.php');
$dbh = connectDB();
?>


<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>メンバー一覧</title>
</head>
<body>
<div class="mx-auto" style="width: 400px;">
  <?php
    try{
      $sql='SELECT code,name FROM member WHERE 1';            //すべての名前データ要求
      $stmt = $dbh->prepare($sql);
      $stmt->execute();                                     //この時点ですべてのデータが入っている

      $dbh=null; 
    
      ?>
      <br/><br/>メンバー一覧<br/><br/>
      <form method="post" action="member_page_branch.php">
      <?php
      
      while(true){                              
        $rec=$stmt->fetch(PDO::FETCH_ASSOC);                //stmtから1レコード取り出す
        if($rec==false){                                    //取り出せるデータなくなったらbreakする
          break;
        }

        ?>
        <!--ラジオボタンidにコードを付け加え-->
      <form method="post" action="member_page_branch.php">
        <div class="custom-control custom-radio">
          <input type="radio" id="customRadio<?php print $rec['code'];?>" name="code" class="custom-control-input"  value=<?php print $rec['code'];?>>
          <label class="custom-control-label" for="customRadio<?php print $rec['code'];?>"><?php print $rec['name'];?></label>
        </div>
        <br/>
        <?php
      }
    ?>
        <button type="submit" name="add" class="btn btn-primary">追加</button>
        <button type="submit" name="edit" class="btn btn-primary">修正</button>
        <button type="submit" name="delete" class="btn btn-primary">削除</button>
      </form>   
    <?php


      /*
        //選んだスタッフが飛んだ先でわかるようにスタッフコードを渡す
        print '<input type ="radio" name="code" value="'.$rec['code'].'">';   //ラジオボタンで選択
        print $rec['name'];
        print '<br/>';
        */

     }catch(Exception $e){
       print 'ただいま障害により大変ご迷惑をお掛けしております。';
       exit();
     }
       
  ?>

<br/><br/>

</div>
</body>
</html>
