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

<form action="post_do.php" method="post"> 
  氏名：<input type="text" name="name"><br>
  出身：<input type="text" name="from_japan"><br>
  年齢：<input type="tel" name="age"><br>
  　　　<input type="submit" value="登録">
</form> 
</main>
</body>    
</html>