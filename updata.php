<?php
require_once('funcs.php');
$pdo = db_conn();
// var_dump($family);

$id= $_POST["id"];
$title= $_POST["title"];
$age= $_POST["age"];
$place= $_POST["place"];
$imageUpdata= $_POST["imageUpdata"];
$comment= $_POST["comment"];
$delete= $_POST["delete"];

echo $id ."<br>";
echo $title."<br>";
echo $age."<br>";
echo $place."<br>";
echo $imageUpdata."<br>";
echo $comment."<br>";
echo $delete."<br>";

if($delete == "delete"){
    $stmt = $pdo->prepare("DELETE FROM gs_item_table WHERE id = :id;");
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);      //Integer（数値の場合 PDO::PARAM_INT)
    $status = $stmt->execute(); //実行
    //４．データ登録処理後
    if ($status == false) {
        $error = $stmt->errorInfo();
            echo ("AAAABBBB");
            print_r($error);//配列の内容を確認
            exit("QueryError:".$error[2]);//処理を止めてエラーの文字列が出る
    } else {
        redirect('index.php');
    }
}else{
    $stmt = $pdo->prepare("UPDATE gs_item_table SET title = :title, age = :age, place = :place, image = :imageUpdata,comment = :comment WHERE id = :id;");
    // $stmt->bindValue(':a1',$mailaddress, PDO::PARAM_STR);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);      //Integer（数値の場合 PDO::PARAM_INT)
    $stmt->bindValue(':title', $title, PDO::PARAM_STR);      //Integer（数値の場合 PDO::PARAM_INT)
    $stmt->bindValue(':age', $age, PDO::PARAM_STR);    //Integer（数値の場合 PDO::PARAM_INT)
    $stmt->bindValue(':place', $place, PDO::PARAM_STR);        //Integer（数値の場合 PDO::PARAM_INT)
    $stmt->bindValue(':imageUpdata', $imageUpdata, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
    $stmt->bindValue(':comment', $comment, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
    $status = $stmt->execute(); //実行
    //４．データ登録処理後
    if ($status == false) {
        $error = $stmt->errorInfo();
            echo ("AAAA");
            print_r($error);//配列の内容を確認
            exit("QueryError:".$error[2]);//処理を止めてエラーの文字列が出る
    } else {
        redirect('index.php');
    }
}
?>