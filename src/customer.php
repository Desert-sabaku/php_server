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
    $sql = "select * from customer";
    $rs = $pdo->query($sql);
    echo "<table border=1>";
    while ($row = $rs->fetch(PDO::FETCH_ASSOC))    // 1行ずつデータを取り出す
    {
        echo "<tr>";
        foreach ($row as $key => $val)
            echo "<td>$key = $val</td>";
        echo "</tr>\n";
    }
    echo "</table>";
} catch (PDOException $e) {
    // エラーが発生した場合，終了
    exit($e->getMessage());
}
?>
