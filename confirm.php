<?php
require_once "help_confirm.php";
include_once "help.php";

Err();

Check_and_Post();

mk_session();
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
// XXX indenterror may cause
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
