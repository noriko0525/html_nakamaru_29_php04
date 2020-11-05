<?php
require_once('funcs.php');
session_start();
$pdo = db_conn();
$mailaddress = $_POST['mailaddress'];
$password = $_POST['password'];
//POSTのvalidate

$stmt = $pdo->prepare("SELECT * FROM gs_member_table WHERE mailaddress = :a1");//LIMIT 1つでも返す
$stmt->bindValue(':a1',$mailaddress, PDO::PARAM_STR);
$status = $stmt->execute();//実行
$result = $stmt->fetch(PDO::FETCH_ASSOC);//マッチした行取得

if($result == NULL){
        redirect("login.php?error=1");
}else{
    if($result['password']==$password){
        if($result['family']== 1){
            $_SESSION['family'] = 1;   
        }else{
            $_SESSION['family'] = 0;
        }
        if($result['grade']== 3){
            $_SESSION['grade'] = 3;
        }else{
            $_SESSION['grade'] = 0;
        }
        $sid = session_id();
        $_SESSION['sid'] = $sid;
        redirect("index.php");
    }else{
        redirect("login.php?error=2");
    }
}

// $mailaddress = $_POST["mailaddress"];
// $password = $_POST["password"];
// // $family = $_POST["family"];
// $pdo = db_conn();
// // var_dump($family);



// if($family !== NULL){
//     foreach($family as $value){
//         $stmt = $pdo->prepare("UPDATE gs_member_table SET family = 1 WHERE mailaddress = :a1");//LIMIT 1つでも返す
//         $stmt->bindValue(':a1',$value, PDO::PARAM_STR);
//         $status = $stmt->execute();//実行
//         // $result = $stmt->fetch();//結果取り出し
//     }
// }else{
// //メールアドレスチェック
//     $stmt = $pdo->prepare("SELECT * FROM gs_member_table WHERE mailaddress = :a1 LIMIT 1");//LIMIT 1つでも返す
//     $stmt->bindValue(':a1',$mailaddress, PDO::PARAM_STR);
//     $status = $stmt->execute();//実行
//     $result = $stmt->fetch();//結果取り出し

//     if($status && $result){
//         echo "既にそのメールアドレスは使用されています。";
//         redirect("register.php?error=1");
//         return;
//     }
    
//     $sql = "INSERT INTO gs_member_table(id,mailaddress,password,inputdate)VALUES(NULL, :a1, :a2, sysdate())";
//     $stmt = $pdo->prepare($sql);
//     $stmt->bindValue(':a1',$mailaddress, PDO::PARAM_STR);//数値の時はPDO::PARAM_STRをPDO::PARAM_INT
//     $stmt->bindValue(':a2',$password, PDO::PARAM_STR);
//     $status = $stmt->execute();

    

//     if($status==false){
//        $error = $stmt->errorInfo();
//        print_r($error);//配列の内容を確認
//         exit("QueryError:".$error[2]);//処理を止めてエラーの文字列が出る
//     }else{
//         redirect("index.php");
//         exit;
//     }
// };
?>