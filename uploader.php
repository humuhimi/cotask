<?php
ini_set("display_errors", 1);
error_reporting(E_ALL);

$id = $_POST['id'];
$image = $_FILE['image']['name'];
$up_err = $_FILE['image']['error'];
$src = $_FILE['image']['tmp'];


if ($up_err == UPLOAD_ERR_OK) {
  if (!move_uploaded_file($src,"Image/".$image)) {
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
  <img src="Image/'<?php echo $image ?>;'">
