<?php

//データーベース接続用の設定ファイルを読み込み
require( __DIR__ . '/../connect.php');
$dbh = connectDB(); 

try{
    $sql='SELECT code,name,bool FROM member WHERE 1';            //すべてのメンバーの名前,boolを要求
    $stmt = $dbh->prepare($sql);
    $stmt->execute();                                    
    $dbh=null; 
    }catch(Exception $e){
    print 'ただいま障害により大変ご迷惑をお掛けしております。';
    exit();
    }
       
  ?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <title>メンバー表</title>
</head>
<body>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<!--ナビバー-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">メンバーの在否一覧</a>
  <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="ナビゲーションの切替">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="top.html">カード読み取り</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="admin/admin_top.php">管理ページ</a>
      </li>
    </ul>
  </div>
</nav>




<!--テーブル-->
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">コード</th>
      <th scope="col">メンバー名</th>
      <th scope="col">在否</th>

    </tr>
  </thead>
  <!--メンバーと状態を書き出し-->
  <tbody>
        <?php
        while(true){                              
            $rec=$stmt->fetch(PDO::FETCH_ASSOC);                //stmtから1レコード取り出す
            if($rec==false){                                    //取り出せるデータなくなったらbreakする
                break;
            }
            //boolの0/1の値を入室/退室に変換,状態によって背景色を変更
            if($rec['bool']==0){
                $rec['bool']="退室";
                $back_color='<div style="background:#FF0033;color:#000000">'.$rec['bool'].'</div>'; //背景赤、文字色白
            }elseif($rec['bool']==1){
                $rec['bool']="在室";
                $back_color='<div style="background:#00FF00;color:#000000">'.$rec['bool'].'</div>'; //背景緑、文字色白
            }
        ?>
    <tr>
      <th scope="row"><?php print $rec['code']?></th>
      <th><?php print $rec['name']?></th>
      <th><?php print $back_color;?></th>
    </tr>
        <?php    
        }
    ?> 
    
  </tbody>
</table>



<br/>
<br/>


</body>
</html>