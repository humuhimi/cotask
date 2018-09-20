<?php if ($_SERVER["HTTP_REFERER"] == "http://".$_SERVER["HTTP_HOST"].dirname($_SERVER['PHP_SELF'])."/finish.php"):?>

<?php
// エラーチェック & PDO情報
require_once "help.php";
require_once "dbset.php";

Err();

$dsn = 'mysql:dbname=Sunseer_BBS; host=localhost; charset=utf8';
$user = 'masa';
$passwd = 'masa';

// 検索オプション設定
// if検索なら
// if (isset($_POST["retreve"])) {
// REVIEW 下の情報を綺麗にまとめる
  @$name = $_POST['name'];
  @$sex = $_POST['sex'];
  @$college = $_POST['college'];
  @$phone = $_POST['phone'];

// TODO 下をクラスから呼び出す　dbー＞select
  try {
    $db = new PDO($dsn,$user,$passwd);
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    echo "connect完了<br>";

    $stat = $db->prepare("SELECT * FROM db_BBS WHERE name1='$name' OR sex='$sex' OR phone='$phone' OR college='$college' ");

    unset($name);
    unset($sex);
    unset($college);
    unset($phone);
    unset($_POST['retreve']);
    ?>

    <!DOCTYPE html>
    <html lang="ja">

    <head>
      <meta charset="utf-8">
      <title>DB</title>
      <style>
      table{
        border-collapse:collapse;
      }
      input { font-weight: bold; }


      </style>
    </head>

    <body>
      <h1>db_BBS</h1>
      <p>↓↓↓↓</p>

        <table border="1" width="100%">
          <thead ><th colspan="13">db_BBS</th></thead>

          <tbody>

        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
            <tr>
              <td>
              </td>
          <td>
            <label for="name">
              <b>姓名:</b>
            </label>
              <input type="name" name="name" id="name" value="">
          </td>

          <td>
          <b>性別</b>
          <br>
            <label for="male">
              <b>男</b>
            </label>
            <input type="radio" name="sex" id="male"  value="男">
          <br>
            <label for="female">
              <b>女</b>
            </label>
              <input type="radio" name="sex" id="female" value="女">
          </td>

          <td>
            <label for="college">
            <b>学校名:</b>
          </label>
            <input type="text" name="college" id="college" value="">
          </td>

          <td>
            <label for="phone">
            <b>電話番号</b>
          </label>
            <input type="text" size="20" id="phone" name="phone" value="" maxlength="15">
          </td>

          <td colspan="2" padding="0">
            <label for="retrive">
            </label>
            <input type="submit" id="retrive" style="border:0;padding:0;background-color:bisque;width:100px;height:70px" value="検索">
          </td>

          <td colspan="4" >
            <label for="reset">
            </label>
            <input type="reset" id="reset" style="border:0;padding:0;background-color:lavender;width:350px;height:70px" value="リセット">
          </td>
        </tr>
      </form>




            <tr>
              <td>icon</td>
              <td>id</td>
              <td>name1</td>
              <td>name2</td>
              <td>sex</td>
              <td>birth</td>
              <td>mail</td>
              <td>phone</td>
              <td>college</td>
              <td>subject</td>
              <td>hobby</td>
            </tr>
<?php

$stat->execute();
// print_r($stat->fetchAll(PDO::FETCH_ASSOC));

//TODO select->show
foreach ($stat->fetchAll(PDO::FETCH_ASSOC) as $row):
 ?>

            <tr>
              <td>
            <img alt="icon" src="<?php echo $row['icon']; ?>">
              </td>
              <td>
                <?php echo $row['id']; ?>
              </td>
              <td>
                <?php echo $row['name1']; ?>
              </td>
              <td>
                <?php echo $row['name2']; ?>
              </td>
              <td>
                <?php echo $row['sex']; ?>
              </td>
              <td>
                <?php echo $row['birth']; ?>
              </td>
              <td>
                <?php echo $row['mail']; ?>
              </td>
              <td>
                <?php echo $row['phone']; ?>
              </td>
              <td>
                <?php echo $row['college']; ?>
              </td>
              <td>
                <?php echo $row['subject']; ?>
              </td>
              <td>
                <?php echo $row['hobby']; ?>
              </td>

            </tr>


<?php
endforeach;
if (isset($row)) {
  // TODO db->fin_db()
  reset($row);
}

// ここまでが検索結果の出力
// 以下がその場合の例外処理
  } catch (\PDOException $e) {
  echo "エラーofretreve:$e->getMessage()";
  }

// ここからは検索ではなく、全体を表示するためのもの



// PDO設定 for get hisotry
// TODO db->select()
try {
    // $db = new PDO($dsn, $user, $passwd);
    echo "接続完了<br>";
  @$id =$_POST['id'];

    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stat = $db->prepare("SELECT * FROM db_BBS");
// 削除昨日
    if (isset($_POST['delete'])) {
    // TODO $db->delete()
      $del = $db->prepare("DELETE FROM db_BBS WHERE id='$id'" );
     $del->execute();
    }
// 編集機能
    // if (isset($_POST['edit'])) {
    //
      // $edit = $db->prepare("UPDATE db_BBS SET *=''  WHERE id='$id'" );
    //   $edit->execute();
    // }

 ?>



        <table border="1" width='100%'>
          <thead ><th colspan="13">↑検索機能↑</th></thead>

          <tbody>

            <tr>
              <td>icon</td>
              <td>id</td>
              <td>name1</td>
              <td>name2</td>
              <td>sex</td>
              <td>birth</td>
              <td>mail</td>
              <td>phone</td>
              <td>college</td>
              <td>subject</td>
              <td>hobby</td>
              <td>option1</td>
              <td>option2</td>
            </tr>
<?php
$stat->execute();
// print_r($stat->fetchAll(PDO::FETCH_ASSOC));
foreach ($stat->fetchAll(PDO::FETCH_ASSOC) as $row):
 ?>

            <tr>
              <td>
            <img alt="icon" src="  <?php echo $row['icon']; ?>">

              </td>
              <td>
                <?php echo $row['id']; ?>
              </td>
              <td>
                <?php echo $row['name1']; ?>
              </td>
              <td>
                <?php echo $row['name2']; ?>
              </td>
              <td>
                <?php echo $row['sex']; ?>
              </td>
              <td>
                <?php echo $row['birth']; ?>
              </td>
              <td>
                <?php echo $row['mail']; ?>
              </td>
              <td>
                <?php echo $row['phone']; ?>
              </td>
              <td>
                <?php echo $row['college']; ?>
              </td>
              <td>
                <?php echo $row['subject']; ?>
              </td>
              <td>
                <?php echo $row['hobby']; ?>
              </td>
              <!--DBの編集機能と削除機能を追加する  -->

              <td>
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">

              <input type="hidden" name="id" value="<?php echo $row['id']?>" >
              <input type="submit" name="delete" id="delete" style="border:0;padding:0;background-color:tomato;width:100px;height:70px" value="削除">
              <br>
              <hr text="1">
             <input type="hidden" name="id" value="<?php echo $row['id']?>" >
              <input type="submit" name="edit" id="edit" style="border:0;padding:0;background-color:dodgerblue;width:100px;height:70px" value="編集">
            </form>
          </td>

          <td>
          <form action="uploader.php" method="POST" enctype="multipart/form-data">

             <input type="hidden" name="id" value="<?php echo $row['id']?>" >
             <input type="hidden" name="MAX_SIZE" value="<?php echo MAX_SIZE ?>" >
              <input type="file" accept="image/*" name="image" style="border:0;padding:0;background-color:honeydew;width:230px;height:70px" id="image" value="画像を選ぶ">
              <hr size="1">
              <input type="submit" name="upload" id="upload" style="border:0;padding:0;background-color:palegreen;width:230px;height:70px" value="アップロード">
            </form>
          </td>
            </tr>


<?php
endforeach;
} catch (\PDOException $e) {
        echo "エラー:$e->getMessage()";
    }
 ?>
 <!-- 正規でない方法による処理 -->
<?php else: ?>
<h3>あなたは正規の方法でこのウェブサイトにアクセスしていません。</h3>
<br>
<a href="#" onclick="javascript:window.history.back(-1);return false;">戻る</a>
<?php endif ;?>
