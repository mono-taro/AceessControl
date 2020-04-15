<?php
require_once( __DIR__ . '/../session.php');
admin_session();
?>
  
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>top</title>
</head>
<body>
<br/>
<div class="mx-auto" style="width: 600px;">
  <div class="list-group">
    <a href="#" class="list-group-item list-group-item-action active">メンバー管理トップページ</a>
    <a href="admin_list.php" class="list-group-item list-group-item-action">管理者一覧</a>
    <a href="member_list.php" class="list-group-item list-group-item-action">メンバー一覧</a>
    <a href="../top.html" class="list-group-item list-group-item-action">カード読み取り</a>
    <a href="../member.php" class="list-group-item list-group-item-action">メンバー表</a>
    <a href="admin_logout.php" class="list-group-item list-group-item-action">ログアウト</a>
  </div>
</div>

</script>
</body>
</html>
