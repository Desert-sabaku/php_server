<?php
// ヒアドキュメント：テーブルseibetu作成
$createSB = <<<DDL
  CREATE  TABLE  seibetu
  (
    id INT PRIMARY KEY,
    danjyo VARCHAR(10)
  )
DDL;
// 行の先頭に記述
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
    );    //$rs = $pdo -> query("drop table seibetu");
    $rs = $pdo->query($createSB);
    // データ挿入
    $rs = $pdo->query("INSERT INTO seibetu (id,danjyo) VALUES(1, '男性')");
    $rs = $pdo->query("INSERT INTO seibetu (id,danjyo) VALUES(2, '女性')");
} catch (PDOException $e) {
    // エラーが発生した場合，終了
    exit($e->getMessage());
}
?>
