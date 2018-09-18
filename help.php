<?php
// htmlエスケープ
function h(string $s){
  return htmlspecialchars($s,ENT_QUOTES,'UTF-8');
}

// エラー出力
function Err(){
ini_set("display_errors", 1);
error_reporting(E_ALL);
}

function reset_all(){
  $db = null;
  session_unset();
  session_destroy();
}

?>
