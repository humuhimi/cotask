<?php if ($_SERVER["HTTP_REFERER"] == "http://".$_SERVER["HTTP_HOST"].dirname($_SERVER['PHP_SELF'])."/input.php"):?>


<?php
require_once "help_confirm.php";
include_once "help.php";

Err();
mk_session();

Check_and_Post();


var_dump($_POST);

// session_destroy();
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <title>BBS</title>
  <style>
  table{
    border-collapse:collapse;
  }
  </style>
</head>

<body>

  <h1>Confirm</h1>
  <form  action="finish.php" method="POST">
    <table border="1">
      <thead ><th colspan="2">個人情報</th></thead>

      <tbody>

        <?php
        if (function_exists('Check_and_Post')) {
          foreach (Check_and_Post() as $column => $data){
          // エスケープ処理
          $column = h($column);
          $data = h($data);

            echo <<<TEXT
            <tr>
            <td>$column</td>
            <td>$data</td>
            </tr>
TEXT;
//  indenterror may cause
}}

?>

        <tr>
        <td>確認-戻る</td>
        <td align="center">
          <input type="submit" name="confirm" value="確認">
        </td>
        </tr>


</tbody>
</table>
</form>
</body>
</html>
<!-- 正規でない場合 -->
<?php else: ?>
<h3>あなたは正規の方法でこのウェブサイトにアクセスしていません。</h3>
<br>
<a href="#" onclick="javascript:window.history.back(-1);return false;">戻る</a>
<?php endif ;?>
