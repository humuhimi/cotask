<?php
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$firstname2 = $_POST['firstname2'];
$lastname2 = $_POST['lastname2'];
$sex = $_POST['sex'];
$date = $_POST['date'];
$mail = $_POST['mail'];
$mailcheck = $_POST['mailcheck'];
$phone = $_POST['phone'];
$college = $_POST['college'];
$subject = $_POST['subject'];
$hobby = $_POST['hobby'];

session_start();
$_SESSION['name1']=$firstname.$lastname;
$_SESSION['name2']=$firstname2.$lastname2;
$_SESSION['sex']=$sex;
$_SESSION['birth']=$date;
$_SESSION['mail']=$mail;
$_SESSION['phone']=$phone;
$_SESSION['college']=$college;
$_SESSION['subject']=$subject;
$_SESSION['hobby']=$hobby;


?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>BBS</title>
</head>
<body>
  <h1>Confirm</h1>
  <form  action="finish.php" method="POST">
    <table border="1">
      <thead ><th colspan="2">登録</th></thead>

      <tbody>

        <tr>
        <td>お名前(全角)</td>
        <td>
          <b>姓:</b>
          <?php echo $firstname; ?>
          <?php echo $lastname; ?>
      </td>
        </tr>


        <tr>
        <td>ふりがな(全角)</td>
        <td>
          <b>姓:</b>
          <?php echo $firstname2; ?>
          <b>名:</b>
          <?php echo $lastname2; ?>
      </td>
        </tr>


        <tr>
        <td>性別</td>
        <td>
        <?php echo $sex; ?>
        </td>
        </tr>


        <tr>
        <td>生年月日(半角)</td>
        <td>
    <?php echo $date; ?>
      </td>
        </tr>


        <tr>
        <td>連絡可能なメールアドレス(半角)</td>
        <td>

        <?php
        if($mail == $mailcheck){
        echo $mail;
      }else {
        header("Location:");
        // input.phpに戻る
      }
// ifの綺麗なやり方をする
         ?>
         </td>
        </tr>


        <tr>
        <td>連絡可能な電話番号</td>
        <td>
        <?php echo $phone; ?>
       </td>
        </tr>


        <tr>
        <td>最終学歴</td>
        <td>
          <?php echo $college; ?>
          <br>
          <?php echo $subject; ?>
       </td>
        </tr>


        <tr>
        <td>特技</td>
        <td>
          <?php echo $hobby; ?>
        </td>
        </tr>


        <tr>
        <td>確認-戻る</td>
        <td align="center">

          <input type="submit" name="confirm" value="確認">

          <b>
            <button>
            <a href="#" onclick="javascript:window.history.back(-1);return false;">戻る</a>
          </button>

          </b>
        </td>
        </tr>

</tbody>
</table>
</form>



</body>
</html>
