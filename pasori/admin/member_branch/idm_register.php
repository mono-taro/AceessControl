<?php  
require( __DIR__ . '/../../connect.php');
$dbh = connectDB(); 



$idm=0;

//IDm読み取り
$command=" echo 'パスワード' | sudo -S python3 ../../nf.py";       //IDm読み取りのためのPython呼び出し
exec($command,$output);
$idm=$output[0];                                                //呼び出したPythonから返ってきた内容を$idmに代入
//サニタイズ処理
$idm=htmlspecialchars($idm,ENT_QUOTES,'UTF-8');

try{
    if($idm!=0){

        //既に登録されているIDmの検索
        $sql='SELECT idm FROM member WHERE idm=?';      //SQL命令文 入れたいデータは「？」
        $stmt=$dbh->prepare($sql);                      //準備する命令
        $data[]=$idm;                                   //「?」にセットしたデータの書き出し
        $stmt->execute($data);                          //クエリの実行
        $rec=$stmt->fetch(PDO::FETCH_ASSOC);
        $dbh=null;

        //既に登録されているIDmだった場合、追加または修正が出来ない      
        if($rec==true){
            print '<br/><h4>既に登録されているカードです<br/>もう一度試してください</h4>';
            exit();
        }
        
        //呼び出し元に返すhtmlタグ
        print '<input type="hidden" name="idm" value="'.$idm.'">
                <br/>
                <br/>
                読み取り完了<br/>
                <input type="submit" class="btn btn-primary" value="次へ">
                </form>';

        exit();

        
    }
}catch(Exception $e){
    print("エラー");
    exit();
}
       


?>
