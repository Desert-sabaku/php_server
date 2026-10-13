<?php
try {
  $pdo = new PDO(
    "mysql:host=mysql;dbname=sample;charset=utf8mb4",
    "user",
    "password",
    [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
      PDO::ATTR_EMULATE_PREPARES => false,
    ]
  );
  $sql = "show tables";
  $rs = $pdo -> query($sql);
  while ($tableName = $rs -> fetchColumn())    // テーブル名を1つずつ取得
  {
    echo htmlspecialchars($tableName, ENT_QUOTES, 'UTF-8') . "<br>\n";
  }
} catch ( PDOException $e ) {
  // エラーが発生した場合，終了
  exit( $e->getMessage() );
}
?> 
