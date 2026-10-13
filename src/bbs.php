<html>
<head>
<meta charset="utf-8">
<title>DBで作るBBS</title>
</head>
<body>
<?php
error_reporting(1);     // Warningを消す
$form = <<<EOT
<form action = "bbs.php" method ="POST">
<table>
<tr><td><font color="blue"> ハンドル名とメッセージを入力して投稿ボタンを押す
</font></td></tr>
<tr><td>ハンドル名：<input type="text"  name="handle"></td></tr>
<tr><td>以下に投稿メッセージを入力してください</td></tr>
<tr><td><textarea  cols = 60  rows = 5  name = message></textarea></td></tr>
<tr><td><input type = submit  value = '投稿'></td></tr>
</table>
</form>
EOT ;      // 行の先頭に入力
// 入力フォームの表示
echo  $form ;
// データベースサーバに接続
try {
    $db = new PDO(
        "mysql:host=mysql;dbname=sample;charset=utf8mb4",
        "user",
        "password",
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ]
    );
  // formのデータを受け取る
  if( $_POST['handle']  != ""  and  $_POST['message']  != "" ) {  // データがある時
         $handle = $_POST['handle'];
         $message = $_POST['message'];
         $date = date("Y-m-d H:i:s");
  // メッセージを追加
         $sql2 = "insert into message_tbl values('{$date}', '{$handle}', '{$message
}' )";
         $db->query($sql2);
  }
// 現時点の全メッセージを表示する
echo  "<table border=1>";
echo  "<tr><th>日時</th><th>ハンドル名</th><th>メッセージ</th></tr>";
$sql1 = "select * from message_tbl";
$rs = $db->query($sql1) ;
while ($row = $rs->fetch() ) {
    echo "<tr>";
    echo "<td>" . htmlspecialchars($row['date'], ENT_QUOTES, 'UTF-8') . "</td>";
    echo "<td>" . htmlspecialchars($row['handle'], ENT_QUOTES, 'UTF-8') . "</td>";
    echo "<td width='500'>" . nl2br(
        htmlspecialchars($row['message'], ENT_QUOTES, 'UTF-8')
    ) . "</td>";
    echo "</tr>";
}
echo  "</table>";
} catch ( PDOException $e ) {
// エラーが発生した場合，終了
exit( $e->getMessage() );
}
?>
</body>
</html>
