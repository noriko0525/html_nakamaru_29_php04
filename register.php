<?php
$family = $_POST["family"];
echo $family;
?>
<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="signin.css">
    <title>会員登録</title>
</head>
<body>
    <div id="wrapper">
        <div class="form-wrapper">
            <h1>会員登録</h1>
            <p class="error" style="display: none;">このメールアドレスは登録されています</p>
            <form action="insert.php" method="post">
            <div class="form-item">
                <label for="email"></label>
                <input type="email" name="mailaddress" required="required" placeholder="Email Address"></input>
              </div>
              <div class="form-item">
                <label for="password"></label>
                <input type="password" name="password" pattern="[0-9a-fA-F]{4,8}" title="4から8文字の数字を入力してください" required="required" placeholder="Password"></input>
              </div>
              <div class="button-panel">
                <!-- <input type="hidden" name="family" value="ss"> -->
                <input type="submit" class="button_g" title="Sign In" value="登録"></input>
              </div>
            </form>
            <div class="form-footer">
              <!-- <p><a href="#">Create an account</a></p>
              <p><a href="#">Forgot password?</a></p> -->
            </div>
          </div>
    </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
var para = $(location).attr('search');
if(para !==""){
  $(".error").css('display','block');
}
console.log(para);
</script>
</body>
</html>