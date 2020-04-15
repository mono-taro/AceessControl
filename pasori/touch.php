<?php  

//データーベース接続用の設定ファイルを読み込み
require( __DIR__ . '/connect.php');
$dbh = connectDB(); 

//LineAPIの設定ファイルを読み込み
require( __DIR__ . '/line_bot.php');

$idm=0;

//IDmの取得
$command="  echo 'パスワード' | sudo -S  python3 nf.py";   //IDm読み取りのためのPython呼び出し
exec($command,$output);
$idm=$output[0];                                        //呼び出したPythonから返ってきた内容を$idmに代入
if($idm!=0){
    //サニタイズ処理
    $idm=htmlspecialchars($idm,ENT_QUOTES,'UTF-8');
     


    //データーベースに一致するメンバーのIDmの検索
    $sql='SELECT name,bool FROM member WHERE idm=?';   //SQL命令文 入れたいデータは「？」
    $stmt=$dbh->prepare($sql);                         //準備する命令
    $data[]=$idm;                                      //「?」にセットしたデータの書き出し
    $stmt->execute($data);                             //クエリの実行
    $rec=$stmt->fetch(PDO::FETCH_ASSOC);
    $name=$rec['name'];                                //一致したメンバー名前の代入
    $bool=$rec['bool'];                                //メンバーの状態(在室かどうか)を取得

    $stmt=null;                                        //データーベース切断
    $data=array();                                     //書き出し用のデータ初期化

    //データーベースに一致するメンバーがいない場合
    if($rec==false){
        print '<meta http-equiv="refresh" content=" 0; url=touch_error.html">';         //メンバーを追加するか確認するtouch_error.htmlに自動で遷移
        exit();
    }
  
    //bool=0不在,bool=1在室

    //不在だった場合
    if($bool==0){
        //bool値の更新
        $sql='UPDATE member SET bool=? WHERE idm=?';
        $stmt=$dbh->prepare($sql);
        $data[]=1;                                          //在室に更新
        $data[]=$idm;          
        $stmt->execute($data);  

        //再生する1~3までの入場音をランダムで決定
        switch(rand(1,3)){                                      
            case 1:
                $music="win2000.mp3";
            break;

            case 2:
                $music="winxp.mp3";
            break;

            case 3:
                $music="win7.mp3";
            break;
        }

        
        //top.htmlにhtmlタグを送る
        print '<center><h1>こんにちは、'.$name.'さん。</h1></center>
            <audio src='.$music.' autoplay></audio>';               //mp3再生タグ 

        //line_botを呼び出す
        $mes=$name."さんが入室しました。";                          //Lineに送るメッセージ
        line($mes);
    
    //在室だった場合
    }else if($bool==1){
        $sql='UPDATE member SET bool=? WHERE idm=?';
        $stmt=$dbh->prepare($sql);
        $data[]=0;                                                  //不在に更新
        $data[]=$idm;          
        $stmt->execute($data);  
        

        //ランダムで退場音を決定
        switch(rand(1,3)){
            case 1:
                $music="win2000off.mp3";

            break;

            case 2:
                $music="winxpoff.mp3";

            break;
            
            case 3:
                $music="7off.mp3";
            break;
        }

        //top.htmlにhtmlタグを送る
        print '<center><h1>お疲れ様でした、'.$name.'さん。</h1></center>
        <audio src='.$music.' autoplay></audio>';

        //Lineに送るメッセージ
        $mes=$name."さんが退室しました。";
        line($mes);

        }
        
        exit();
}else{
    //idm取得失敗 USBが接続されていない/権限が付与されていない可能性あり  
    print '<div class="alert alert-info" role="alert"><center><h4>リーダーの接続を確認してください</h4></center>    </div>';
    exit();
} 


?>
