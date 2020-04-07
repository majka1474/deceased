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
  <?php
    $prefecture = array(
    0 => '選択して下さい。',
    1 => '北海道',
    2 => '青森県',
    3 => '岩手県',
    4 => '宮城県',
    5 => '秋田県',
    6 => '山形県',
    7 => '福島県',
    8 => '茨城県',
    9 => '栃木県',
    10 => '群馬県',
    11 => '埼玉県',
    12 => '千葉県',
    13 => '東京都',
    14 => '神奈川県',
    15 => '山梨県',
    16 => '長野県',
    17 => '新潟県',
    18 => '富山県',
    19 => '石川県',
    20 => '福井県',
    21 => '岐阜県',
    22 => '静岡県',
    23 => '愛知県',
    24 => '三重県',
    25 => '滋賀県',
    26 => '京都府',
    27 => '大阪府',
    28 => '兵庫県',
    29 => '奈良県',
    30 => '和歌山県',
    31 => '鳥取県',
    32 => '島根県',
    33 => '岡山県',
    34 => '広島県',
    35 => '山口県',
    36 => '徳島県',
    37 => '香川県',
    38 => '愛媛県',
    39 => '高知県',
    40 => '福岡県',
    41 => '佐賀県',
    42 => '長崎県',
    43 => '熊本県',
    44 => '大分県',
    45 => '宮崎県',
    46 => '鹿児島県',
    47 => '沖縄県'
    );
  ?>
  出身：
  <select name="from_japan">
    <?php foreach($prefecture as $key => $value){ ?>
    <option name= "from_japan" value="<?php echo $value; ?>"><?php echo $value; ?></option>
    <?php } ?>
  </select><br>  
  年齢：<input type="tel" name="age"><br>
  　　　<input type="submit" value="更新">
</form> 
</main>
</body>    
</html>