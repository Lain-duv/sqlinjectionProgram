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

  // $price = "';DELETE FROM fruit-- ";
    $name = $_POST["name"];
    $sql = sprintf("SELECT * FROM fruit WHERE name = '%s'", $name);
    $stmt = $pdo->query($sql);
    $result = $stmt->fetchAll();
    // var_dump($result);

  // 例外処理
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
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <title>Document</title>
</head>
<body>
  <div class="container mt-5">
    <h1>検索結果</h1>
    <table class="table table-striped">
      <thead class="thead-dark">
        <tr>
          <th>商品名</th>
          <th>価格</th>
        </tr>
      </thead>
        <tbody>
          <?php if(count($result) == 0){ ?>
              <td colspan="2" align="center"> レコードが存在しません。</td>
          <?php }else{ ?>
            <?php foreach($result as $p): ?>
              <tr>
                <td> <?php echo $p["name"] ?></td>
                <td> <?php echo $p["price"] ?></td>
              </tr>
            <?php endforeach; ?>
          <?php } ?>
        </tbody>
      </table>
  </div>
</body>
</html>
