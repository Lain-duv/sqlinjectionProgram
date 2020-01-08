<?php

// ドライバ呼び出しを使用して MySQL データベースに接続します
$dsn = 'mysql:dbname=mydb;host=localhost';
$user = 'root';
$password = '';

try {
  $pdo = new PDO(
      $dsn,
      $user,
      $password,
      array(
          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
          PDO::ATTR_EMULATE_PREPARES => true,
      )
  );
    // echo "接続成功<br>";
    // SQL文を準備します。「:id」「:name」がプレースホルダーです。
    // $sql = 'INSERT INTO user (id, name) VALUE (:id, :name)';
    // $prepare = $dbh->prepare($sql);
    //
    // $prepare->bindValue(':id', 4, PDO::PARAM_INT);
    // $prepare->bindValue(':name', 'kobayashi', PDO::PARAM_STR);
    // $prepare->execute();

    // INSERTされたデータを確認します
    # 対策
    // $stmt = $pdo->prepare('SELECT * FROM fruit WHERE price = ? AND name = ?');
    // $name = $_POST["name"];
    // $price = $_POST["price"];
    // $price = "100' OR 'A' = 'A";
    // $price = "100';DELETE FROM fruit-- ";
    // $stmt->bindValue(1,$price,PDO::PARAM_INT);
    // $stmt->bindValue(2,$name,PDO::PARAM_STR);
    // $stmt->execute();



    $price = $_POST["price"];
    // $price = "';DELETE FROM fruit-- ";
    // $res = $pdo->quote($price);
    // echo $res."<br>";
    // $sql = sprintf("SELECT name FROM fruit WHERE price = '%s'", $res);
    $sql = sprintf("SELECT name FROM fruit WHERE price = '%s'", $price);
    $stmt = $pdo->query($sql);

    $result = $stmt->fetchAll(PDO::FETCH_COLUMN);
    // var_dump($result);

    // 素敵な処理
} catch (PDOException $e) {
    echo "接続失敗: " . $e->getMessage() . "<br>";
    exit();
}

// INSERT INTO `fruit` (`name`, `price`) VALUES ('Apple', '100'), ('Banana', '200'), ('Oeange', '300');
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <?php
    foreach($result as $p){
      echo $p."<br>";
    }
   ?>
</body>
</html>
