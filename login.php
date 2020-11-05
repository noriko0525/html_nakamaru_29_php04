<?php
session_start();
?>
<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="signin.css">
    <title>ログイン</title>
</head>
<body>
    <div id="wrapper">
        <div class="form-wrapper">
            <h1>ログイン</h1>
            <p class="error" style="display: none;">メールアドレスがちがいます</p>
            <p class="error2" style="display: none;">パスワードがちがいます</p>
            <form action="insertin.php" method="post">
              <div class="form-item">
                <label for="email"></label>
                <input type="email" name="mailaddress" required="required" placeholder="Email Address"></input>
              </div>
              <div class="form-item">
                <label for="password"></label>
                <input type="password" name="password"pattern="[0-9a-fA-F]{4,8}" title="4から8文字の数字を入力してください" required="required" placeholder="Password"></input>
              </div>
              <div class="button-panel">
                <input type="submit" class="button" title="Sign In" value="ログイン"></input>
              </div>
            </form>
            <div class="form-footer">
              <!-- <p><a href="#">アカウント作成</a></p> -->
              <!-- <p><a href="#">パスワード忘れ</a></p> -->
            </div>
          </div>
    </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
var para = $(location).attr('search');
console.log(para);
if(para =="?error=1"){
  $(".error").css('display','block');
}else if(para =="?error=2"){
  $(".error2").css('display','block');
}
console.log(para);
</script>
</body>
</html>