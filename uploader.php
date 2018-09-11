<?php
ini_set("display_errors", 1);
error_reporting(E_ALL);
$dsn = 'mysql:dbname=Sunseer_BBS; host=localhost; charset=utf8';
$user = 'masa';
$passwd = 'masa';

$id = $_POST['id'];
$image = $_FILES['image']['name'];
$up_err = $_FILES['image']['error'];
$src = $_FILES['image']['tmp_name'];
$type = $_FILES['image']['type'];
$dir = "Image/".$image;
$image_size = getimagesize($_FILES['image']['tmp_name']);

define("MAX_SIZE",1*1024*1024);
define("THUMBNAIL_WIDTH",400);
define("IMAGES_DIR",__DIR__."/Image");
define("THUMBNAIL_DIR",__DIR__."/Thumbs".'/'.$image);
// TODO:他のTHUMBNAIL_DIRも変更して


echo THUMBNAIL_DIR;







if ($_FILES['image']['size']<MAX_SIZE){
  $image_width = $image_size[0];
  $image_height = $image_size[1];


// THUMBNAIL_WITDH →Use of undefined constant THUMBNAIL_WITDH - assumed 'THUMBNAIL_WITDH' (this will throw an Error in a future version of PHP)
  if ($image_width > 400 ) {
    //:TODO $type におけるエラーなので。あとで治す
    // switch ($type) {
    //   case IMAGETYPE_GIF;
    //  $src_Image = imagecreatefromgif($src);
    //  break;
    //   case IMAGETYPE_PNG;
    // $src_Image =  imagecreatefrompng($src);
    //   break;
    //   case IMAGETYPE_JPEG;
    // $src_Image =  imagecreatefromjpeg($src);
    //   break;
    //   default:
    //   echo "判別・作成できません";
    //   break;
    // }
    $src_Image = imagecreatefromjpeg($src);
    $thumbwidth = 100;
    $thumbheight = round($image_height * 100/$image_width);
    $thumbImage = imagecreatetruecolor(100,$thumbheight);
    imagecopyresampled($thumbImage,$src_Image,0,0,0,0,$thumbwidth,$thumbheight,$image_width,$image_height);
  //   switch($type){
  //   case IMAGETYPE_GIF;
  //  imagegif($thumbImage,THUMBNAIL_DIR.'/'.$image);
  //  // ファイルの出力
  //   case IMAGETYPE_PNG;
  //   imagepng($thumbImage,THUMBNAIL_DIR.'/'.$image);
  //   case IMAGETYPE_JPEG;
  //   imagejpeg($thumbImage,THUMBNAIL_DIR.'/'.$image);
  //   //
  //   break;
  //   default:
  //   echo "判別できません";
  //   break;
  // }
  imagejpeg($thumbImage,__DIR__."/Thumbs".'/'.$image);
  $thumb_db ="Thumbs".'/'.$image;
  try {
    $db = new PDO($dsn,$user,$passwd);
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    $sql2 =  "UPDATE db_BBS SET icon='$thumb_db' WHERE id='$id'";

    if(!$db->query($sql2)){
      echo "sql処理に問題あり";
    }
  } catch (\PDOException $e) {
    echo $e->getMessage();
  }


  }
}else {
echo "画像ファイルのサイズが大きすぎます";

if ($up_err == UPLOAD_ERR_OK) {
  if (move_uploaded_file($src,$dir)) {
    try {

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
}

var_dump($_FILES);
// print __DIR__;
// $savePath = IMAGES_DIR."/{$src}";





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
  <h1>thumbnail</h1>

  <img src="<?php echo $thumb_db; ?>">
  <!--:TODO なぜか　php echo THUMBNAIL_DIR; ?> では表示されない? path miss ? or -->
<br>
<br>
  <?php
  echo $thumb_db;
  echo " <a href=".$_SERVER['HTTP_REFERER'].">前に戻る</a>" ;
  ?>
