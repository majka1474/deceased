<!doctype html>
<html lang="ja">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="css/style.css">

<title>Obituary</title>
</head>
<body>
<header>
<h1 class="font-weight-normal">PHP</h1>    
</header>

<main>
<h2>LIST</h2>
<pre>
  <?php
    try {
      $db = new PDO('mysql:dbname=deceased;host=127.0.0.1;charaset=utf8', 'root', '');

      $statement = $db->prepare('UPDATE to_pass_away SET name=?, from_japan=?, age=? WHERE id=?');
      $statement->bindParam(1, $_POST['name']);
      $statement->bindParam(2, $_POST['from_japan']);
      $statement->bindParam(3, $_POST['age']);
      $statement->bindParam(4, $_POST['id']);
      $statement->execute();
      echo '更新されました';
    } catch(PDOException $e) {
      echo 'DB接続エラー: ' . $e->getMessage();
    }
  ?>
</pre>
<!-- indexに戻る(登録したやつを表示させる) -->
<a href="index.php">ホームへ</a>
</main>
</body>    
</html>