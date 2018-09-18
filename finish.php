<?php
include_once "help.php";
require_once "dbset.php";
Err();
 ?>



<?php if (isset($_POST['confirm'])){
$db = new DBset();
  $db->connect();
$db->insert();

}else(
  print<<<EOD
あなたは正規の方法でこのウェブサイトにアクセスしていません。
<br>
<a href="#" onclick="javascript:window.history.back(-1);return false;">戻る</a>
EOD
)
?>
