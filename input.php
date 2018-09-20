<?php
require_once "help.php";
require_once "help_confirm.php";

Err();

// mk_session();

session_start();

// var_dump($_SESSION);
echo "<br>";
var_dump($_POST);
// session_destroy();



// if($_POST){
  // 空エラー error

    $_SESSION["firstname"] = $_POST['firstname'];


    $_SESSION["lastname"] = $_POST['lastname'];


    $_SESSION["firstname2"] = $_POST['firstname2'];


    $_SESSION["lastname2"] = $_POST['lastname2'];


    $_SESSION["sex"] = $_POST['sex'];


    $_SESSION["mail"] = $_POST['mail'];


    $_SESSION["mailcheck"] = $_POST['mailcheck'];


    $_SESSION["phone"] = $_POST['phone'];


    $_SESSION["date"] = $_POST['date'];


    $_SESSION["college"] = $_POST['college'];


    $_SESSION["subject"] = $_POST['subject'];


    $_SESSION["hobby"] = $_POST['hobby'];
// 文字数エラー error
// if(mb_strlen($_POST['firstname'])>20){
//   @$error["firstname"] = 'over';
// }
// if(mb_strlen($_POST['mailcheck'])>20){
//   @$error["mailcheck"] = 'over';
// }
// if(mb_strlen($_POST['firstname2'])>20){
//   @$error["firstname2"] = 'over';
// }
// if(mb_strlen($_POST['mailcheck2'])>20){
//   @$error["mailcheck2"] = 'over';
// }
// if(mb_strlen($_POST['hobby'])>200){
//   @$error["mailcheck2"] = 'over';
// }
// 正規表現チェック
// if (!preg_match('/([0-9]{3})-([0-9]{4})-([0-9]{4})/',$_POST['phone']){
  // @$error['phone'] ="unmatch";
// }

if(($_POST['mail'] == $_POST['mailcheck']&&strpos($_POST['mail'],"@")>0)){
  @$error['mail'] = "unmatch";

}
if(isset($_POST["firstname"])){
  @$error["firstname"] = null;
}


// 次のページに飛ぶ
echo "ああああ";
// header("Location:input.php");

// }


 ?>


<!--oTODO 保持した状態で表示するようにしないとね  -->

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <title>BBS</title>
  <style>
  .error {color:red;}
  table{
    border-collapse:collapse;
  }
  </style>
  <style>

  input[type=date]::-webkit-calendar-picker-indicator {
            /* 好きなだけpx調整 */
            padding: 40px;
        }
  </style>

</head>

<body>

  <h1>BBS</h1>
  <p color="red">hello</p>
<?php
if(
($_POST["firstname"] != "")&&
($_POST["lastname"] != "")&&
($_POST["firstname2"] != "")&&
($_POST["lastname2"] != "")&&
($_POST["sex"] != "")&&
($_POST["date"] != "")&&
($_POST["mail"] != "")&&
($_POST["mailcheck"] != "")&&
($_POST["phone"] != "")&&
($_POST["college"] != "")&&
($_POST["subject"] != "")&&
($_POST["submit"] == "確認")):
   ?>
  <form  action="confirm.php" method="POST">
<?php  else :?>

  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method= "POST" >

 <?php  endif;?>

    <table border="1" >

      <thead ><th colspan="2">個人情報登録</th></thead>
      <tbody>

<!--漢字  -->
        <tr>
        <td>お名前(全角)</td>
        <td>
        <label for="firstname">
          <b>姓:</b>
        </label>
          <input type="name" id="firstname" name="firstname"　maxlength="20" value="<?php print $_SESSION['firstname'] ?>">
          <?php if(@$_SESSION["firstname"] == ""): ?>
            <p class="error" color="red">姓を入力してください</p>
          <?php endif;?>

          <label for="lastname">
          <b>名:</b>
      　  </label>
          <input width="136.31"　type="name" id="lastname" name="lastname" value="<?php print $_SESSION['lastname'] ?>" maxlength="20">
          <?php if(@$_SESSION["lastname"] == ""): ?>
            <p class="error" color="red">名を入力してください</p>
          <?php endif;?>
      </td>
        </tr>

<!--ふりがな  -->
        <tr>
        <td>ふりがな(全角)</td>
        <td>
        <label for="firstname2">
          <b>姓:</b>
        </label>
          <input type="name" id="firstname2" name="firstname2" value="<?php print $_SESSION['firstname2'] ?>">
          <?php if(@$_SESSION["firstname2"] == ""): ?>
            <p class="error" color="red">姓を入力してください</p>
          <?php endif;?>
        <label for="lastname2">
          <b>名:</b>
        </label>
          <input width="136.31"　type="name" id="lastname2" name="lastname2" value="<?php print $_SESSION['firstname2'] ?>">
          <?php if(@$_SESSION["lastname2"] == ""): ?>
            <p class="error" color="red">名を入力してください</p>
          <?php endif;?>


      </td>
        </tr>

<!--性別  -->
        <tr>
        <td>性別</td>
        <td>
          <label for="male">
            <b>男</b>
          </label>
          <input type="radio" name="sex" id="male"  value="男" checked>
          <label for="female">
            <b>女</b>
          </label>
            <input type="radio" name="sex" id="female" value="女">
        </td>
        </tr>

<!--生年月日  -->
<!-- sessionを保持するようにする  -->
        <tr>

        <td>
        <label for="date">
          生年月日
        </label>
      </td>
        <td>
        <input type="date" id="date" name="date" value="<?php print $_SESSION['date'] ?>" autocomplete="on" >
        <?php if(($_SESSION["date"] == "")): ?>
          <p class="error" color="red">生年月日を適切に入力してください</p>
        <?php endif;?>
      </td>
      <!--生年月日終了  -->
        </tr>

<!--メアド  -->
        <tr>
        <td>連絡可能なメールアドレス(半角)</td>
        <td>
          <input type="text" size="30" name="mail" value="<?php print $_SESSION['mail'] ?>" maxlength="30">
        <b>例:xxxxxx@xxxx.xxx</b>
        <?php if($_SESSION["mail"] ==""): ?>
          <p class="error" color="red">メールアドレスを入力してください</p>
        <?php endif;?>
         </td>
        </tr>

<!-- メアド確認 -->
        <tr>
        <td>確認入力</td>
        <td>
          <input type="text" size="30" name="mailcheck" value="<?php print $_SESSION['mailcheck'] ?>" maxlength="30">
          <?php if($_SESSION["mailcheck"] == ""): ?>
            <p class="error" color="red">確認用メールアドレスを入力してください</p>
          <?php endif;?>
         </td>
        </tr>


<!--電話番号  -->
        <tr>
        <td>連絡可能な電話番号(携帯)</td>
        <td>
          <input type="text" size="20" name="phone" value="<?php print $_SESSION['phone'] ?>" maxlength="15">
          <b>例:</b>
         <a href="*">0x0-xxxx-xxxx</a>
         <?php if($_SESSION["phone"] == ""): ?>
           <p class="error" color="red">電話番号を入力してください</p>
         <?php endif;?>
       </td>
        </tr>


<!--学歴  -->
        <tr>
        <td>最終学歴</td>
        <td>
          <label for="college">
          <b>学校名:</b>
        </label>
          <input type="text" name="college" id="college" value="<?php print $_SESSION['college'] ?>">
          <b>例:東京大学</b>
          <?php if($_SESSION["college"] == ""): ?>
            <p class="error" color="red">大学名を入力してください</p>
          <?php endif;?>
          <br>
          <label for="subject">
          <b>学部・学科・科名</b>
        </label>
          <input type="text" name="subject" id="subject" value="<?php print $_SESSION['subject'] ?>">
          <?php if($_SESSION["subject"] == ""): ?>
            <p class="error" color="red">学部や学科を入力してください</p>
          <?php endif;?>
          <br>
       </td>
        </tr>

<!--特技  -->
        <tr>
          <label for="hobby">
        <td>特技</td>
      </label>
        <td>
          <textarea placeholder="200文字まで" name="hobby" id="hobby" maxlength="200"  cols="40" rows="10" ><?php print $_SESSION['hobby'] ?></textarea>
            <?php if($_SESSION["hobby"] == ""): ?>
              <p class="error" color="red">特技を入力してください</p>
            <?php endif;?>
            <?php if(isset($_POST['hobby'])){unset($error["hobby"]);} ?>

        </td>
        </tr>

<!--確認,リセット  -->
        <tr>
        <td>確認-リセット</td>
        <td align="center">
          <input type="submit" name="submit" value="確認">
          <input type="reset">
        </td>
        </tr>
</tbody>
</table>
</form>
<?php
if(($_POST['submit'] == "確認")||isset($_POST)){

  foreach ($_POST as $value) {
    if (($value == "")||is_null($value)){
    goto end;
    }
  }
// header("Location:" .$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/confirm.php");
// exit();
}
end:
echo "<br>blank箇所があるか値が入っていません<br>";

 ?>
</body>
</html>
