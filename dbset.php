<?php

class DBset{

  private $dsn;
  private $user;
  private $passwd;
  private $name1;
  private $name2;
  private $sex;
  private $birth;
  private $mail;
  private $phone;
  private $college;
  private $subject;
  private $hobby;
  private $stat;
  public $db;
//  construct 用のfunc作る

public function __construct(){
  $this->dsn = 'mysql:dbname=Sunseer_BBS; host=localhost; charset=utf8';
  $this->user = 'masa';
  $this->passwd = 'masa';
 // function Use_Session(){
  session_start();
    //session 呼び出しをここでする
  $this->name1 = $_SESSION['name1'];
  $this->name2 = $_SESSION['name2'];
  $this->sex = $_SESSION['sex'];
  $this->birth = $_SESSION['birth'];
  $this->mail = $_SESSION['mail'];
  $this->phone = $_SESSION['phone'];
  $this->college = $_SESSION['college'];
  $this->subject = $_SESSION['subject'];
  $this->hobby = $_SESSION['hobby'];
  }


  // connect 用のfunc作る
public function connect(){
  try {
    var_dump($this->dsn,$this->user,$this->passwd);
    $db = new PDO($this->dsn,$this->user,$this->passwd);
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    echo "connect完了";
    return $db;
   } catch (\PDOException $e) {
    echo "connectエラー:{$e->getMessage()}";
  }
}


//select 用のfunc作る
public function select(){
  try {
     $db =$this->connect();
    // var_dump($db);
    $stat =  $db->prepare("SELECT * FROM db_BBS");
    $stat->execute();
    echo "select成功";

    foreach ($stat->fetchAll(PDO::FETCH_ASSOC) as $column => $data){
      $column = h($column);
      $data = h($data);
        echo <<<SHOW
        <tr>
        <td>$column</td>
        <td>$data</td>
        </tr>
SHOW;
    }

  } catch (\PDOException $es) {
    echo "selectエラー：{$es->getMessage()}";
  }
}


// insert 用のfunc作る
public function insert(){
  try {
    $db =$this->connect();
    // var_dump($db);
    $stat = $db->prepare("INSERT INTO db_BBS(id,name1,name2,sex,birth,mail,phone,college,subject,hobby,icon)
                          VALUES(:id,:name1,:name2,:sex,:birth,:mail,:phone,:college,:subject,:hobby,:icon)");

    $stat->bindValue(':id',NULL);
    $stat->bindValue(':name1',$this->name1);
    $stat->bindValue(':name2',$this->name2);
    $stat->bindValue(':sex',$this->sex);
    $stat->bindValue(':birth',$this->birth);
    $stat->bindValue(':mail',$this->mail);
    $stat->bindValue(':phone',$this->phone);
    $stat->bindValue(':college',$this->college);
    $stat->bindValue(':subject',$this->subject);
    $stat->bindValue(':hobby',$this->hobby);
    $stat->bindValue(':icon',"Image/icon.05.42.png");
    $stat->execute();
    echo "insert完了";

       // echo "<br>insert完了";}else{
       //   echo "エラー";
       // }
    // $stat->execute();
}catch (\PDOException $ei) {
  echo "insertエラー:{$ei->getMessage()}";
}
}

//update 用のfunc作る

public function update(){
  try {
    $db =$this->connect();
    // var_dump($db);
    // REVIEW id を中に含める処理をする
   $stat = $db->prepare("UPDATE db_BBS SET ???=??? FROM db_BBS WHERE id='$id'");
   // TODO SET間の処理をする
   $stat->execute();
   echo "update完了";
 } catch (\PDOException $eu) {
    echo "updateエラー:{$eu->getMessage()}";
  }
}

//delete 用のfunc作る
public function delete(){
  try {
    $db =$this->connect();
    // var_dump($db);
    // REVIEW id を中に含める処理をする
    $stat = $db->prepare("DELETE FROM db_BBS WHERE id='$id'" );
   $stat->execute();
   echo "delete成功";
  } catch (\PDOException $ed) {
    echo "deleteエラー:{$ed->getMessage()}";
  }
}

// TODO 画像upload 用のfuncを作る

//最後の処理に当たる　func
public function fin_db(){
  session_unset();
  session_destroy();
  unset($GLOBALS['db']);
  unset($db);
// 前のページに飛ぶ
  header("Location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/history.php');
}
}
?>
