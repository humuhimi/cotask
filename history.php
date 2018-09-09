<?php
ini_set("display_errors", 1);
error_reporting(E_ALL);

$dsn = 'mysql:dbname=Sunseer_BBS; host=localhost; charset=utf8';
$user = 'masa';
$passwd = 'masa';

try {
    $db = new PDO($dsn, $user, $passwd);
    echo "接続完了<br>";

    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stat = $db->query("SELECT * FROM db_BBS");
    // print_r($stat->fetchAll(PDO::FETCH_ASSOC));
    foreach ($stat->fetchAll(PDO::FETCH_ASSOC) as $row):
 ?>

    <!DOCTYPE html>
    <html lang="ja">
    <head>
      <meta charset="utf-8">
      <title>DB</title>
    </head>
    <body>
      <h1>db_BBS</h1>
      <p>↓↓↓↓</p>
        <table border="1">
          <thead ><th colspan="10">db_BBS</th></thead>
          <tbody>
            <tr>
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

            <tr>
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

} catch (\PDOException $e) {
        echo "エラー:$e->getMessage()";
    }





 ?>
