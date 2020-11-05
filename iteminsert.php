<?php
// phpinfo();　//よくわからないエラーが出たらphpinfo()
// return;

//1.入力チェック
//入力チェック
// エラーを出力する
ini_set('display_errors', "On");
$family = 0;
$title   = $_POST["title"];
$age   = $_POST["age"];
$place    = $_POST["place"];
$comment = $_POST["comment"];
$secretmes = "";
$secretmesto = "";
// $image = $_POST["up_file"];
$image = "file/".$_FILES['up_file']['name'];

function dbg($msg)
{
    echo $msg;
    echo "<br>";
    echo "出力";
}
// dbg($family);
if(
    !isset($_POST["title"]) || $_POST["title"] =="" ||
    !isset($_POST["age"]) || $_POST["age"] =="" ||
    !isset($_POST["place"]) || $_POST["place"] ==""||
    !isset($_FILES['up_file']['name']) || $_FILES['up_file']['name'] ==""
    // !isset($_POST["comment"]) || $_POST["comment"] ==""
){
    if($_POST["title"] ==""){
        $error_message['title'] = 'たいとるをいれてね';
        // exit('ParamErrorTitile');
        echo $error_message['title'];
    }
    if($_POST["age"] ==""){
        $error_message['age'] = 'ねんれいをいれてね';
        echo "BBBB"; 
        // exit('ParamErrorGenre');
    }
    if($_POST["place"] ==""){
        $error_message['place'] = 'ばしょをいれてね';
        echo "CCCC"; 
        // exit('ParamErrorStar');
    }
    if($_FILES['up_file']['name'] ==""){
        $error_message['up_file'] = 'がぞうをいれてね';
        echo "DDDD"; 
        // exit('ParamErrorImage');
    }
    // header("Location: index.php");
}
// elseif (empty($error_message)) {
//     header("Location: select.php");
//     exit();
// // }else(!empty($_SESSION['input_data'])) {
// //     $_POST = $_SESSION['input_data'];
// }
// session_destroy();

// $id      = $_POST["id"];

//一時ファイルができているか（アップロードされているか）チェック
//https://www.php.net/manual/ja/function.is-uploaded-file.php
if(is_uploaded_file($_FILES['up_file']['tmp_name'])){
    //一時ファイルを保存ファイルにコピーできたか
    //https://techacademy.jp/magazine/18804
    if(move_uploaded_file($_FILES['up_file']['tmp_name'],"file/".$_FILES['up_file']['name'])){
        //正常
        echo "uploaded";
    }else{
        //コピーに失敗（だいたい、ディレクトリがないか、パーミッションエラー）
        echo "error while saving.";
    }
}else{
    //そもそもファイルが来ていない。
    echo "file not uploaded.";
}

//2.書き込み処理
try{
    $pdo=new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','root');//ホストアドレス,IDパスはさくらなどレンタルサーバーの際は書き換え
}catch(PDOException $e){
    exit('DbConnectError:' .$e->getMessage());
}

$sql = "INSERT INTO gs_item_table(id,title,age,place,image,comment,secretmesto,secretmes,inputdate)VALUES(NULL, :a1, :a2, :a3, :a4, :a5, :a6, :a7,sysdate())";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':a1',$title, PDO::PARAM_STR);//数値の時はPDO::PARAM_STRをPDO::PARAM_INT
$stmt->bindValue(':a2',$age, PDO::PARAM_INT);
$stmt->bindValue(':a3',$place, PDO::PARAM_STR);
$stmt->bindValue(':a4',$image, PDO::PARAM_STR);
$stmt->bindValue(':a5',$comment, PDO::PARAM_STR);
$stmt->bindValue(':a6',$secretmesto, PDO::PARAM_STR);
$stmt->bindValue(':a7',$secretmes, PDO::PARAM_STR);
// $stmt->bindValue(':a4',sysdate(), PDO::PARAM_STR);　//sysdateはnullでも自動で入れてくれる仕組み
$status = $stmt->execute();

//エラーチェック
if($status==false){
    $error = $stmt->errorInfo();
    print_r($error);//配列の内容を確認
    exit("QueryError:".$error[2]);//処理を止めてエラーの文字列が出る
 }else{
     header("Location: index.php");//半角スペースを入れること、エラーになるよ
     exit;
 }

?>