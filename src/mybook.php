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
    $table = $pdo->query("select * from mybook");
    echo "<table border=2>";
    echo "<tr><th>title</th><th>author</th><th>publisher</th></tr>";
    while ($row = $table->fetch()) {
        echo "<tr>";				 // 結果を表形式で表示
        echo "<td>" . $row['title'] . "</td>";
        echo "<td>" . $row['author'] . "</td>";
        echo "<td>" . $row['publish'] . "</td>";
        echo "</tr>\n";
    }
    echo "</table>";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
