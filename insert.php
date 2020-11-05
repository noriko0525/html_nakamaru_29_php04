<?php
require_once('funcs.php');
$mailaddress = $_POST["mailaddress"];
$password = $_POST["password"];
$family = $_POST["family"];
$pdo = db_conn();
// var_dump($family);

if($family !== NULL){
    echo("DDD");
    foreach($family as $value){
        $stmt = $pdo->prepare("UPDATE gs_member_table SET family = 1 WHERE mailaddress = :a1");//LIMIT 1つでも返す
        $stmt->bindValue(':a1',$value, PDO::PARAM_STR);
        $status = $stmt->execute();//実行
        // $result = $stmt->fetch();//結果取り出し
    }
    header("Location: index.php");//半角スペースを入れること、エラーになるよ
    exit;
}else{echo("EEE");
//メールアドレスチェック
    $stmt = $pdo->prepare("SELECT * FROM gs_member_table WHERE mailaddress = :a1 LIMIT 1");//LIMIT 1つでも返す
    $stmt->bindValue(':a1',$mailaddress, PDO::PARAM_STR);
    $status = $stmt->execute();//実行
    $result = $stmt->fetch();//結果取り出し

    if($status && $result){
        echo "既にそのメールアドレスは使用されています。";
        redirect("register.php?error=1");
        return;
    }
    $sql = "INSERT INTO gs_member_table(id,mailaddress,password,inputdate)VALUES(NULL, :a1, :a2, sysdate())";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':a1',$mailaddress, PDO::PARAM_STR);//数値の時はPDO::PARAM_STRをPDO::PARAM_INT
    $stmt->bindValue(':a2',$password, PDO::PARAM_STR);
    $status = $stmt->execute();
    echo("CCC");

    if($status==false){
        $error = $stmt->errorInfo();
        print_r($error);//配列の内容を確認
        exit("QueryError:".$error[2]);//処理を止めてエラーの文字列が出る
    }else{
        echo("BBB");
        // redirect("index.php");
        header("Location: index.php");//半角スペースを入れること、エラーになるよ
        exit;
    }
}
?>