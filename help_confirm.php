<?php

// チェックとポストに必須な要素
function Check_and_Post(){

$return = '<a href="'.$_SERVER['HTTP_REFERER'].'">前に戻る</a>';

if (!(isset($_POST['phone']) && preg_match('/([0-9]{3})-([0-9]{4})-([0-9]{4})/',$_POST['phone']))) {
echo $_POST['phone']."は日本では使われていない電話番号です。<br>登録し直してください<br>";
echo $return;

}elseif(!($_POST['mail'] == $_POST['mailcheck']&&strpos($_POST['mail'],"@")>0)){
  echo $_POST['mail']."は間違ったメールアドレスです<br>";
  echo $return;

}else {
  echo "チェック完了";
  return array(
    "お名前" => $_POST['firstname'].$_POST['lastname'],
    "ふりがな" => $_POST['firstname2'].$_POST['lastname2'],
    "性別" => $_POST['sex'],
    "生年月日" => $_POST['date'],
    "連絡可能なメールアドレス" => $_POST['mail'],
    "連絡可能な電話番号" => $_POST['phone'],
    "最終学歴" => $_POST['college'],
    "学科" => $_POST['subject'],
    "特技" => $_POST['hobby']
  );

}
}

// セッションに必須な要素
function mk_session(){

  session_start();
  $_SESSION['name1']=$_POST['firstname'].$_POST['lastname'];
  $_SESSION['name2']= $_POST['firstname2'].$_POST['lastname2'];
  $_SESSION['sex']=$_POST['sex'];
  $_SESSION['birth']=$_POST['date'];
  $_SESSION['mail']=$_POST['mail'];
  $_SESSION['phone']=$_POST['phone'];
  $_SESSION['college']=$_POST['college'];
  $_SESSION['subject']=$_POST['subject'];
  $_SESSION['hobby']=$_POST['hobby'];
}



 ?>
