<?php
require_once('funcs.php');
session_start();

$sid0 = $_SESSION['sid'];//ログイン時のセッションID
$sid1 = session_id();//現在のセッションID
if($sid0 !== $sid1){
    redirect("login.php");
    exit;
};

$pdo = db_conn();
$mailaddress = $_POST['mailaddress'];
$family = $_SESSION['family'];
$grade = $_SESSION['grade'];

$view="";
$view2="";
$view3="";
$view4="";
$view5="";
$view6="";
$view7="";
$stmt = $pdo->prepare("SELECT * FROM gs_item_table");
$status = $stmt->execute();//実行
// $result = $stmt->fetch();//結果取り出し

//会員属性でのだし分け　左上属性表示、右メニュー
if($family == 1){
    $view2 .= '<div id="itemAdd">追加する</div>';
    $view6 .= '管理者';
}
if($grade == 3){
    $view3 .= '<a href="member.php"><div id="invite">管理者</div></a>';
    $view6 .= 'スーパー管理者';
}
if($family == NULL){
    $view6 .= '一般会員';
}
//会員属性でのだし分け　item更新カード内ボタン
if($family){
    $view4 .= '<tr>\
    <td colspan="2" class="Itemcenter">\
    <input class="Itemcenter" id="btn-addItem" type="submit" value="更新する"></td></tr>';
    $view5 .= '<img src="file/spacer.gif" width="400"><input type="file" class="inpitImage" accept="image/*" name="up_file" required="required">';
    $view8 .='<form method="post" action="updata.php" enctype="multipart/form-data">';
    $view9 .='<input type="submit" class="close" value="×"></form>';
    $view10 .='<input type ="hidden" name="delete" value="delete">';
}else{
    $view4 .= '<tr style="display:none;">\
    <td colspan="2" class="Itemcenter">\
    <input class="Itemcenter" id="btn-addItem" type="submit" value="更新する"></td></tr>';
    $view5 .= '<img src="file/spacer.gif" width="400">';
    $view8 .='';
    $view9 .='';
    $view10 .='';
}

//itemへデータ引継ぎ
if($status==false){
    $error = $stmt->errorInfo();
    exit("QueryError:".$error[2]);//処理を止めてエラーの文字列が出る
 }else{
    while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
        $view .= '<div class="grid" id="'.$result["id"].'">';
        $view .= $view8;
        $view .= '<img src="' .$result["image"] .'"class="imgId" width="500" ';
        $view .= ' data0="'.$result["id"].'"';
        $view .= ' data1="'.$result["title"].'"';
        $view .= ' data2="'.$result["age"].'"';
        $view .= ' data3="'.$result["place"].'"';
        $view .= ' data4="'.$result["image"].'"';
        $view .= ' data5="'.$result["comment"].'"';
        $view .= ' data6="'.$result["secretmesto"].'"';
        $view .= ' data7="'.$result["secretmes"].'"';
        $view .= ' data8="'.$result["inputdate"].'"';
        $view .= ' data9="itemupdate"';
        $view .= '>';
        $view .= '<p class="itamTitle">' .$result["title"] .'</p>';
        $view .= '<input type ="hidden" name="id" value="'.$result["id"].'">';
        $view .= $view10;
        $view .= $view9;
        $view .= '</div>';
    }
}


//データ更新用カード
$view7 .= '<div id="itemUpdata">';
$view7 .= $view8;
// $view7 .= '<form method="post" action="iteminsert.php" enctype="multipart/form-data">';
$view7 .= '<div class="bg_item"></div>';
$view7 .= '<div id="modal_wrapper">';
$view7 .= '<div class="photo"></div>';
$view7 .= '<div class="image-box">';
$view7 .= $view5;
$view7 .= '</div>';
$view7 .= '<p class="closeBtn">×</p>';
$view7 .= '<div id="detail">';
$view7 .= '<table>';
$view7 .= '<tr>';
$view7 .= '<th>タイトル</th>';
$view7 .= '<td><input class="detail-form-txt" type="text" name="title" required="required"></td>';
$view7 .= '</tr>';
$view7 .= '<tr>';
$view7 .= '<th>年齢</th>';
$view7 .= '<td><input class="detail-form-txt" type="text" name="age" required="required"></td>';
$view7 .= '</tr>';
$view7 .= '<tr>';
$view7 .= '<th>場所</th>';
$view7 .= '<td><input class="detail-form-txt" type="text" name="place" required="required"></td>';
$view7 .= '</tr>';
$view7 .= '<tr>';
$view7 .= '<th>コメント</th>';
$view7 .= '<td><textarea class="detail-form-comment" name="comment" cols="30" rows="10"></textarea></td>';
$view7 .= '</tr>';
$view7 .= '<tr style="display:none;">';
$view7 .= '<td class="seacret" colspan="2">';
$view7 .= '<div class="seacret-title">秘密メッセージ</div>';
$view7 .= '<div class="seacret-pull cp_ipselect cp_sl05">';
$view7 .= '<select name="secretmesto">';
$view7 .= '<option value="choix-2">Inception</option>';
$view7 .= '<option value="choix-3">Godzilla</option>';
$view7 .= '<option value="choix-4">Back to the future</option>';
$view7 .= '<option value="choix-5">Shutter Island</option>';
$view7 .= '</select>';
$view7 .= '</div>';
$view7 .= '</td>';
$view7 .= '</tr>';
$view7 .= '<tr style="display:none;">';
$view7 .= '<td colspan="2"><textarea class="detail-form-comment" name="secretmes" cols="30" rows="10"></textarea></td>';
$view7 .= '</tr>';
$view7 .= $view4;
$view7 .= '</table>';
$view7 .= '</div>';
$view7 .= '</div>';
$view7 .= '</form>';
$view7 .= '</div>';
?>

<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>マイページ</title>
</head>
<body>
    <div id="wrapper">
        <div class="sheets-wrapper">
            <!--fixed-->
           <div id="header">
                <div id="header-wrapper">
                    <div id="item-left">
                    <?=$view6?>
                    </div>
                    <div id="item-middle">
                        <form method="get" action="#" class="search_container">
                            <input type="text" size="70" placeholder="　キーワード検索">
                            <input type="submit" value="&#xf002">
                        </form>
                    </div>
                    <div id="item-right">
                    <a href="logout.php"><input class="btn" type="submit" value="ログアウト"></a>
                        <!-- <button class="btn btn--logout btn--radius" type="submit" value="Log Out"></button> -->
                    </div>
                </div>
            </div>
            </div>
            <div id="memberAdd">
                <?=$view2?>
                <?=$view3?>
            </div>
           <!--//fixed-->
           <!--item-->
           <div id="item">
                <div class="item grid-container">
                    <?=$view?>
                </div>
            </div>
            <!--//item-->
    </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(function(){
        $(".imgId").on('click',function(){
            console.log($(this).attr('data0'));
            $("#wrapper").append('<?php echo $view7 ?>');
            $("#wrapper input[name=title]").val($(this).attr('data1'));
            $("#wrapper input[name=age]").val($(this).attr('data2'));
            $("#wrapper input[name=place]").val($(this).attr('data3'));
            $("#wrapper textarea[name=comment]").val($(this).attr('data5'));
            $(".image-box").children('img').attr('src', $(this).attr('data4'));
            // $("#modal_wrapper").prepend('<?php echo "$view8" ?>');
            $(".bg_item").append('<input type="hidden" name="imageUpdata" value="'+$(this).attr('data4')+'"><input type ="hidden" name="id" value="'+$(this).attr('data0')+'">');
            $(".inpitImage").css('display','none');
            $(".inpitImage").removeAttr('required');
            $(".closeBtn").on('click',function(){
                $("#itemUpdata").remove();
            });
            $('input[type=file]').change(prepareImage);    
        });
        $("#itemAdd").on('click',function(){
            $("#wrapper").append('<?php echo $view7 ?>');
            $(".closeBtn").on('click',function(){
                $("#itemUpdata").remove();
            });
            $('input[type=file]').change(prepareImage);    
        });
        function prepareImage()
        {
            //選択したファイルを取得し、file変数に格納
            var file = $(this).prop('files')[0];
            // 画像以外は処理を停止
            if (!file.type.match('image.*')) {
                // クリア
                $(this).val(''); //選択されてるファイルを空にする
                $('.image-box > img').html(''); //画像表示箇所を空にする
                return;
            }
            // 画像表示
            var reader = new FileReader(); //1
            reader.onload = function() {   //2
                // var photoImageWidth = $(".photo").width();
                $('.image-box > img').attr('src', reader.result);
            }
            reader.readAsDataURL(file);    //3
        }            
    });
</script>
</body>
</html>