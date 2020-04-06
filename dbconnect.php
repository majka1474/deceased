<?php
try {
  $db = new PDO('mysql:dbname=deceased;host=127.0.0.1;charaset=utf8', 'root', '');
} catch (PDOException $e) {
  echo 'DB接続エラー: ' . $e->getMessage();
}
?>



