<?php require('dbconnect.php'); ?>
<!-- 管理者確認 -->
<!-- if (管理者) {
    この中にhtml　
} else {
    header('Location:' index.php);
    exit();
}
 -->



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

<?php 
  if(isset($_REQUEST['id']) && is_numeric($_REQUEST['id'])) {

    $id = $_REQUEST['id'];

    $lists = $db->prepare('SELECT * FROM to_pass_away WHERE id=?');
    $lists->execute(array($id));
    $list = $lists->fetch();
  }
?>

<form action="update_do.php" method="post"> 
  <input type="hidden" name="id" value="<?php print($id); ?>">
  氏名：<input type="text" name="name"><br>
  出身：<input type="text" name="from_japan"><br>
  年齢：<input type="tel" name="age"><br>
  　　　<input type="submit" value="更新">
</form> 
</main>
</body>    
</html>