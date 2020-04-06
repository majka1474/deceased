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
  // 値が渡らない
  require('dbconnect.php');

  if (isset($_GET['id']) && is_numeric($_GET['id'])) {

    $id = $_GET['id'];
    $stmt = $db->prepare('DELETE FROM to_pass_away WHERE id=?');
    $stmt->execute([$id]);
  }
  header('Location: index.php');
  ?>
</pre>


</pre>
<!-- indexに戻る(登録したやつを表示させる) -->
<a href="index.php">ホームへ</a>
</main>
</body>    
</html>