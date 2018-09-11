<?php
ini_set("display_errors", 1);
error_reporting(E_ALL);
$dsn = 'mysql:dbname=Sunseer_BBS; host=localhost; charset=utf8';
$user = 'masa';
$passwd = 'masa';

define("IMAGES_DIR",__DIR__."/Image");


$id = $_POST['id'];
$image = $_FILES['image']['name'];
$up_err = $_FILES['image']['error'];
$src = $_FILES['image']['tmp_name'];
$dir = "Image/".$image;

var_dump($_FILES);
// print __DIR__;
// $savePath = IMAGES_DIR."/{$src}";




if ($up_err == UPLOAD_ERR_OK) {
  if (move_uploaded_file($src,$dir)) {
    try {
      $db = new PDO($dsn,$user,$passwd);
      $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      $sql = "UPDATE db_BBS SET icon='$dir' WHERE id='$id'";
      // $stat = $db->query()
      if(!$db->query($sql)){
        echo "sql処理に問題あり";
      }
    } catch (\PDOException $e) {
      print $e->getMessage();
    }
// :TODO
}else{
    echo "アップロード処理に失敗しました";
}
}else {
  echo "エラー:{$up_err}<br>";
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>upload image</title>
</head>
<body>
  <h1>images</h1>
  <img src="<?php echo "Image/".$image; ?>">
