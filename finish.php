<?php
include_once "help.php";
require_once "dbset.php";
Err();
 ?>




<?php if (isset($_POST['confirm'])){
$db = new DBset();
  $db->connect();
$db->insert();
echo "<br><a href='history.php'>全体表示へ</a> <br>";
// form の挿入　hsitory 送信ボタンでいいやん。
}else(
  print<<<EOD
あなたは正規の方法でこのウェブサイトにアクセスしていません。
<br>
<a href="#" onclick="javascript:window.history.back(-1);return false;">戻る</a>
EOD
)

?>
