<?php
    require_once( __DIR__ . '/../../session.php');
    admin_session();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IDm読み取り</title>
</head>
<body>
<div class="mx-auto" style="width: 400px;">  
  <?php 


  $name=$_POST['name']; 
  $type=$_POST['type'];

  //$typeでどこから飛んできたのか確認、$typeによってページの飛び先を変える
  if($type=='edit'){
    $code=$_POST['code'];
    $url="member_edit_check.php";     
  }elseif($type=='add'){
    $code;
    $url="member_add_check.php";
  }

  if($name==''){
    ?>
    <br/><p>登録エラー<br/>名前が入力されていません</p>
    <br/><br/>
    <form>
    <input type="button" onclick="history.back()" value="戻る">
    </form>
    <?php
    exit();
  }?>


  <br/><br/>IDmを読み取ります。<br/>
  NFCリーダーにカードをかざしてください。<br/>
  <br/>
  <input type="button" class="btn btn-primary" onclick="history.back()" value="戻る">
  <input id="read" type="button" class="btn btn-primary" value="読み取る"/>

  <form method="post" action="<?php print $url;?>">
  <input type="hidden" name="code" value=" <?php print $code;?> ">
  <input type="hidden" name="name" value=" <?php print $name;?> ">
  <div id="result"></div>

  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script>


  var idm="0";
  $(function(){
    //読み取りボタンがクリックされたら実行  
    $("#read").click(function(event){
      $.ajax({
        url: "idm_register.php",      //呼び出し先
        dataType : "text",
        async: true,
      }).done(function(data){
        console.log(data + "を取得しました。");

        $("#result").html(data);      //<div id="result">にdataを代入

        
        

      })
    });

  });


  </script>

</div>

</body>
</html>