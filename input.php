<?php
require_once "help.php";
require_once "help_confirm.php";

Err();

// mk_session();

session_start();

var_dump($_SESSION);
echo "<br>";
var_dump($_POST);
session_destroy();

// REVIEW 普通にerror いらないんで


// if($_POST){
  // 空エラー error
  if($_POST['firstname'] == ""){
    $_SESSION['firstname'] = "";
  }else{
    $_SESSION["firstname"] = $_POST['firstname'];
  }
  if($_POST['lastname'] == ""){
    $_SESSION['lastname'] = "";
    }else{
    $_SESSION["lastname"] = $_POST['lastname'];
    }
  if($_POST['firstname2'] == ""){
    $_SESSION['firstname2'] = "";
    }else{
    $_SESSION["firstname2"] = $_POST['firstname2'];
    }
  if($_POST['lastname2'] == ""){
    $_SESSION['lastname2'] = "";
    }else{
    $_SESSION["lastname2"] = $_POST['lastname2'];
    }
  if($_POST['sex'] == ""){
    $_SESSION['sex'] = "";
    }else{
    $_SESSION["sex"] = $_POST['sex'];
    }
  if($_POST['mail'] == ""){
    $_SESSION['mail'] = "";
    }else{
    $_SESSION["mail"] = $_POST['mail'];
    }
  if($_POST['mailcheck'] == ""){
    $_SESSION['mailcheck'] = "";
    }else{
    $_SESSION["mailcheck"] = $_POST['phone'];
    }
  if($_POST['phone'] =="") {
    $_SESSION['phone'] = "";
    }else{
    $_SESSION["phone"] = $_POST['phone'];
    }
  if($_POST['year'] == ""){
    $_SESSION['year'] = "";
    }else{
    $_SESSION["year"] = $_POST['year'];
    }
  if($_POST['month'] == ""){
    $_SESSION['month'] = "";
    }else{
    $_SESSION["month"] = $_POST['month'];
    }
  if($_POST['day'] == ""){
    $_SESSION['day'] = "";
    }else{
    $_SESSION["day"] = $_POST['day'];
    }
  if($_POST['college'] == ""){
    $_SESSION['college'] = "";
    }else{
    $_SESSION["college"] = $_POST['college'];
    }
  if($_POST['subject'] == ""){
    $_SESSION['subject'] = "";
    }else{
    $_SESSION["subject"] = $_POST['subject'];
    }
  if($_POST['hobby'] ==""){
    $_SESSION['hobby'] = "";
    }else{
    $_SESSION["hobby"] = $_POST['hobby'];
    }
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
($_POST["year"] != "")&&
($_POST["month"] != "")&&
($_POST["day"] != "")&&
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

    <table border="1">

      <thead ><th colspan="2">登録</th></thead>
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
<!--TODO sessionを保持するようにする  -->
        <tr>

        <td>
        <label for="date" >
          生年月日(半角)
        </label>
        </td>
        <td>
<?php if(is_null($_SESSION['year'])||($_SESSION['year'] == "")) :?>
          <select name="year">
<option value="">-</option>
<option value="1900">1900</option>
<option value="1901">1901</option>
<option value="1902">1902</option>
<option value="1903">1903</option>
<option value="1904">1904</option>
<option value="1905">1905</option>
<option value="1906">1906</option>
<option value="1907">1907</option>
<option value="1908">1908</option>
<option value="1909">1909</option>
<option value="1910">1910</option>
<option value="1911">1911</option>
<option value="1912">1912</option>
<option value="1913">1913</option>
<option value="1914">1914</option>
<option value="1915">1915</option>
<option value="1916">1916</option>
<option value="1917">1917</option>
<option value="1918">1918</option>
<option value="1919">1919</option>
<option value="1920">1920</option>
<option value="1921">1921</option>
<option value="1922">1922</option>
<option value="1923">1923</option>
<option value="1924">1924</option>
<option value="1925">1925</option>
<option value="1926">1926</option>
<option value="1927">1927</option>
<option value="1928">1928</option>
<option value="1929">1929</option>
<option value="1930">1930</option>
<option value="1931">1931</option>
<option value="1932">1932</option>
<option value="1933">1933</option>
<option value="1934">1934</option>
<option value="1935">1935</option>
<option value="1936">1936</option>
<option value="1937">1937</option>
<option value="1938">1938</option>
<option value="1939">1939</option>
<option value="1940">1940</option>
<option value="1941">1941</option>
<option value="1942">1942</option>
<option value="1943">1943</option>
<option value="1944">1944</option>
<option value="1945">1945</option>
<option value="1946">1946</option>
<option value="1947">1947</option>
<option value="1948">1948</option>
<option value="1949">1949</option>
<option value="1950">1950</option>
<option value="1951">1951</option>
<option value="1952">1952</option>
<option value="1953">1953</option>
<option value="1954">1954</option>
<option value="1955">1955</option>
<option value="1956">1956</option>
<option value="1957">1957</option>
<option value="1958">1958</option>
<option value="1959">1959</option>
<option value="1960">1960</option>
<option value="1961">1961</option>
<option value="1962">1962</option>
<option value="1963">1963</option>
<option value="1964">1964</option>
<option value="1965">1965</option>
<option value="1966">1966</option>
<option value="1967">1967</option>
<option value="1968">1968</option>
<option value="1969">1969</option>
<option value="1970">1970</option>
<option value="1971">1971</option>
<option value="1972">1972</option>
<option value="1973">1973</option>
<option value="1974">1974</option>
<option value="1975">1975</option>
<option value="1976">1976</option>
<option value="1977">1977</option>
<option value="1978">1978</option>
<option value="1979">1979</option>
<option value="1980">1980</option>
<option value="1981">1981</option>
<option value="1982">1982</option>
<option value="1983">1983</option>
<option value="1984">1984</option>
<option value="1985">1985</option>
<option value="1986">1986</option>
<option value="1987">1987</option>
<option value="1988">1988</option>
<option value="1989">1989</option>
<option value="1990">1990</option>
<option value="1991">1991</option>
<option value="1992">1992</option>
<option value="1993">1993</option>
<option value="1994">1994</option>
<option value="1995">1995</option>
<option value="1996">1996</option>
<option value="1997">1997</option>
<option value="1998">1998</option>
<option value="1999">1999</option>
<option value="2000">2000</option>
<option value="2001">2001</option>
<option value="2002">2002</option>
<option value="2003">2003</option>
<option value="2004">2004</option>
<option value="2005">2005</option>
<option value="2006">2006</option>
<option value="2007">2007</option>
<option value="2008">2008</option>
<option value="2009">2009</option>
<option value="2010">2010</option>
<option value="2011">2011</option>
<option value="2012">2012</option>
<option value="2013">2013</option>
<option value="2014">2014</option>
<option value="2015">2015</option>
<option value="2016">2016</option>
<option value="2017">2017</option>
<option value="2018">2018</option>
<option value="2019">2019</option>
<option value="2020">2020</option>
<option value="2021">2021</option>
<option value="2022">2022</option>
<option value="2023">2023</option>
<option value="2024">2024</option>
<option value="2025">2025</option>
<option value="2026">2026</option>
<option value="2027">2027</option>
<option value="2028">2028</option>
<option value="2029">2029</option>
<option value="2030">2030</option>
</select>　年
<?php else:?>
<?php print $_SESSION['year']."年" ?>
<?php endif ;?>

<?php if(is_null($_SESSION['month'])||($_SESSION['month'] == "")) :?>
<select name="month">
<option value="">-</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
</select>　月
<?php else:?>
<?php print $_SESSION['month']."月" ?>
<?php endif ;?>

<?php if(is_null($_SESSION['day'])||($_SESSION['day'] == "")) :?>
<select name="day" >
<option value="">-</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
</select>　日
<?php else:?>
<?php print $_SESSION['day']."日" ?>
<?php endif ;?>


<?php if(@$_SESSION["year"]||$_SESSION["month"]||@$_SESSION["day"] == ""): ?>
  <p class="error" color="red">生年月日を適切に入力してください</p>
<?php endif;?>

<!--
        </td>
        <td>
        <input type="date" id="date" name="date" value="" autocomplete="on" >
        <b>例:2018/09/07</b> -->
        <!-- <input type="month" name="date" value="">
        <b>月</b>
        <input type="day" name="date" value="">
        <b>日</b> -->
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
          <?php if(@$_SESSION["mailcheck"] == ""): ?>
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
         <?php if(@$_SESSION["phone"] == ""): ?>
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
          <?php if(@$_SESSION["college"] == ""): ?>
            <p class="error" color="red">大学名を入力してください</p>
          <?php endif;?>
          <br>
          <label for="subject">
          <b>学部・学科・科名</b>
        </label>
          <input type="text" name="subject" id="subject" value="<?php print $_SESSION['subject'] ?>">
          <?php if(@$_SESSION["subject"] == ""): ?>
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
            <?php if(@$_SESSION["hobby"] == ""): ?>
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
