<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <title>BBS</title>
</head>

<body>

  <h1>BBS</h1>
  <p>hello</p>

  <form  action="confirm.php" method="POST">
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
          <input type="name" id="firstname" name="firstname" value="">
          <b>例:アース</b>
          <label for="lastname">
          <b>名:</b>
      　  </label>
          <input width="136.31"　type="name" id="lastname" name="lastname" value="">
          <b>例:太郎</b>
      </td>
        </tr>

<!--ふりがな  -->
        <tr>
        <td>ふりがな(全角)</td>
        <td>
        <label for="firstname2">
          <b>姓:</b>
        </label>
          <input type="name" id="firstname2" name="firstname2" value="">
          <b>例:あーす</b>
        <label for="lastname2">
          <b>名:</b>
        </label>
          <input width="136.31"　type="name" id="lastname2" name="lastname2" value="">
          <b>例:たろう</b>
      </td>
        </tr>

<!--性別  -->
        <tr>
        <td>性別</td>
        <td>
          <label for="male">
            <b>男</b>
          </label>
          <input type="radio" name="sex" id="male"  value="男">
          <label for="female">
            <b>女</b>
          </label>
            <input type="radio" name="sex" id="female" value="女">
        </td>
        </tr>

<!--生年月日  -->
        <tr>
        <td>生年月日(半角)</td>
        <td>
        <input type="date" name="date" value="">
        <b>例:2018/09/07</b>
        <!-- <input type="month" name="date" value="">
        <b>月</b>
        <input type="day" name="date" value="">
        <b>日</b> -->
      </td>
        </tr>

<!--メアド  -->
        <tr>
        <td>連絡可能なメールアドレス(半角)</td>
        <td>
          <input type="text" size="30" name="mail" value="" maxlength="30">
        <b>例:xxxxxx@xxxx.xxx</b>
         </td>
        </tr>

<!-- メアド確認 -->
        <tr>
        <td>確認入力</td>
        <td>
          <input type="text" size="30" name="mailcheck" value="" maxlength="30">
         </td>
        </tr>

<!--電話番号  -->
        <tr>
        <td>連絡可能な電話番号(携帯)</td>
        <td>
          <input type="text" size="20" name="phone" value="" maxlength="15">
          <b>例:</b>
         <a href="*">0x0-xxxx-xxxx</a>
       </td>
        </tr>

<!--学歴  -->
        <tr>
        <td>最終学歴</td>
        <td>
          <label for="college">
          <b>学校名:</b>
        </label>
          <input type="text" name="college" id="college" value="">
          <b>例:東京大学</b>
          <br>
          <label for="subject">
          <b>学部・学科・科名</b>
        </label>
          <input type="text" name="subject" id="subject" value="">
          <br>
       </td>
        </tr>

<!--特技  -->
        <tr>
        <td>特技</td>
        <td>
          <textarea name="hobby" value=""></textarea>
        </td>
        </tr>

<!--確認,リセット  -->
        <tr>
        <td>確認-リセット</td>
        <td align="center">
          <input type="submit" value="確認">
          <input type="reset">
        </td>
        </tr>
</tbody>
</table>
</form>

</body>
</html>
