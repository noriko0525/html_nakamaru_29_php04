<?php
ini_set('display_errors', "On");
require_once('funcs.php');
$pdo = db_conn();
$view="";

$sql = "SELECT mailaddress,family FROM gs_member_table";
$stmt = $pdo->prepare($sql);
// $stmt->bindValue(':id',$id,PDO::PARAM_INT);
$status = $stmt->execute();//実行
//$result = $stmt->fetchAll();//結果取り出し
//var_dump($result);
if($status==false){
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);//処理を止めてエラーの文字列が出る
}else{
  while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
        if($result['family']==1){
              $view .='<tr>';
              $view .='<th class="check"><input class="family-check" type="checkbox" name="family[]" checked="checked" value="'.$result["mailaddress"].'"></th>';
              $view .=' <td class="address">'.$result["mailaddress"].'</td>';
              $view .='</tr>';
      }else{
              $view .='<tr>';
              $view .='<th class="check"><input class="family-check" type="checkbox" name="family[]" value="'.$result["mailaddress"].'"></th>';
              $view .=' <td class="address">'.$result["mailaddress"].'</td>';
              $view .='</tr>';
      }
  }   
}
?>
<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="signin.css">
    <title>メンバー</title>
</head>
<body>
    <div id="wrapper">
        <div class="form-wrapper-m">
            <h1>メンバー管理</h1>
            <form action="insert.php" method="post">
              <div class="form-item">
                  <table>
                  <?=$view?>
                  </table>
              </div>
              <div class="button-panel">
                <!-- <input type="hidden" name="family" value="ss"> -->
                <input type="submit" class="button_m" title="Sign In" value="登録"></input>
              </div>
            </form>
            <div class="form-footer"></div>
          </div>
    </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>
</html>