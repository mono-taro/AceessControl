<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


<?php
//ログイン要求
function admin_session(){
    session_start();
    session_regenerate_id(true);
    if(isset($_SESSION['login'])==false){
        ?>
        <div class="mx-auto" style="width: 300px;">
            <br/><br/>
            <h3>ログインしていません</h3>
            <br/><br/>
        </div>   
        <div class="mx-auto" style="width: 200px;">
            <button type="button" class="btn btn-primary" onclick="history.back()">戻る</button>
            <button type="button" class="btn btn-primary" onclick="location.href='/pasori/admin/admin_login.html'">ログイン</button>
        </div>

        <?php
        exit();
    }else{
        ?>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="/pasori/admin/admin_top.php">管理者ページ</a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="ナビゲーションの切替">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                <a class="nav-link" href=""><?php print $_SESSION['name'].'さんログイン中'?><span class="sr-only"></span></a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="/pasori/admin/admin_logout.php">ログアウト</a>
                </li>
            </ul>
            </div>
         </nav>

        <?php
 
    }

}

?>
