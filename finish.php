<?php
ini_set("display_errors",1);
error_reporting(E_ALL);

session_start();

function say_Session(){
print  $_SESSION['name1'];
print  $_SESSION['name2'];
print  $_SESSION['sex'];
print  $_SESSION['birth'];
print  $_SESSION['mail'];
print  $_SESSION['phone'];
print  $_SESSION['college'];
print  $_SESSION['subject'];
print  $_SESSION['hobby'];
}
if (isset($_POST['confirm'])) {
  $dsn = 'mysql:dbname=Sunseer_BBS; host=localhost; charset=utf8';
  $user = 'masa';
  $passwd = 'masa';
}else {
  echo "あなたは正規の方法でこのウェブサイトにアクセスしていません。";
  ?>
  <br>
  <a href="#" onclick="javascript:window.history.back(-1);return false;">戻る</a>
  <?php
}
try {
  $db = new PDO($dsn,$user,$passwd);
  $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  var_dump($db);
  echo "接続に成功しました";
  $stat = $db->prepare("INSERT INTO db_BBS(id,name1,name2,sex,birth,mail,phone,college,subject,hobby)
                        VALUES(:id,:name1,:name2,:sex,:birth,:mail,:phone,:college,:subject,:hobby)");

  $stat->bindValue(':id',NULL);
  $stat->bindValue(':name1',$_SESSION['name1']);
  $stat->bindValue(':name2',$_SESSION['name2']);
  $stat->bindValue(':sex',$_SESSION['sex']);
  $stat->bindValue(':birth',$_SESSION['birth']);
  $stat->bindValue(':mail',$_SESSION['mail']);
  $stat->bindValue(':phone',$_SESSION['phone']);
  $stat->bindValue(':college',$_SESSION['college']);
  $stat->bindValue(':subject',$_SESSION['subject']);
  $stat->bindValue(':hobby',$_SESSION['hobby']);
  // $stat->execute();
  if (!($stat->execute())) {
    echo "eor";
  }


  header("Location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/history.php');

} catch (\PDOException $e) {
print "<br>接続エラー:{$e->getMessage()}";
say_Session();


}finally{
  $db = null;
  session_unset();
  session_destroy();
}

 ?>
