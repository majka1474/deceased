<!-- 編集機能を搭載させる -->

<?php
// DBに接続しデータを取得する
ini_set('display_errors', 1);
error_reporting(E_ALL);
require('dbconnect.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty(filter_input(INPUT_POST, 'name'))) {
        $name = filter_input(INPUT_POST, 'name');
        try {
            $pdo = new PDO('mysql:dbname=deceased;host=127.0.0.1;charaset=utf8', 'root', '');
            $stmt = $pdo->prepare('SELECT * FROM `to_pass_away` WHERE `name` = :name');
            $stmt->bindParam(':name', $name);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $exception) {
            echo $exception->getMessage();
            exit();
        }
    }
}
?>
<html lang="ja">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="css/style.css">

<title>Obituary</title>
</head>
<body>
<header>
<h1 class="font-weight-normal">Obituary</h1>    
</header>

<main>
<h2><a href="index.php"><font color="#000000">LIST</font></a></h2>

<form action='' method='post'>
    <label>
        <input type='text' name='name'>
    </label>
    <input type='submit' value="検索">
</form>

<!-- 検索結果表示 -->
<div id="result">
  <?php if ($_SERVER['REQUEST_METHOD'] === 'POST') { ?>
    <?php if (empty($result)) { ?>
        <strong>該当する結果はなし。</strong>
    <?php } else { ?>
        <ol>
            <?php foreach ($result as &$value) { ?>
                <li><?php echo htmlspecialchars($value['from_japan'], ENT_QUOTES, 'UTF-8') . " : " . htmlspecialchars($value['name'], ENT_QUOTES, 'UTF-8') . "さん" .  "   " . $value['age'] . "歳"; ?></li>
            <?php } ?>
        </ol>
    <?php } ?>
  <?php } ?>
</div>

<?php
require('dbconnect.php');

// ページurl初期化index.php = page=1
if (isset($_REQUEST['page']) && is_numeric(($_REQUEST['page']))) {
  $page = $_REQUEST['page'];
} else {
  $page = 1;
}

$start = 5 * ($page - 1);

$lists = $db->prepare('SELECT * FROM to_pass_away  ORDER BY id DESC LIMIT ?, 5');
$lists->bindParam(1, $start, PDO::PARAM_INT);
$lists->execute();
?>

<!-- リスト表示 -->
<article>
  <?php while($list = $lists->fetch()): ?>
    <p><?php print('名前:  ' . $list['name'] . 'さん  ' .  '     ' .  '出身:  '  . $list['from_japan'] . '    ' .  $list['age'] . '歳');?></p>
    <time><?php print($list['created']); ?></time>
    <!-- 管理者のみ表示　今回はスルー -->
    <a href="update.php?id=<?php print($list['id']);?>">編集</a>
    ｜
    <a href="delete.php?id=<?php print($list['id']);?>">削除</a>
    <hr>
  <?php endwhile; ?>

    <!-- ページネーション -->
  <?php if ($page >= 2): ?>
    <a href="index.php?page=<?php print($page-1); ?>"><?php print($page-1); ?>ページ目へ</a>
  <?php endif; ?>
  
  <?php
  $counts = $db->query('SELECT COUNT(*) as cnt FROM to_pass_away'); 
  $count = $counts->fetch();
  $max_page = ceil($count['cnt'] / 5);
  if ($page < $max_page):
  ?>
    <a href="index.php?page=<?php print($page+1); ?>"><?php print($page+1); ?>ページ目へ</a>
  <?php endif; ?>

</article>





<!-- 管理者のみ表示させる -->
<form action="post.php" method="get">
    <input type="submit" value="投稿">
</form>
</main>
</body>    
</html>