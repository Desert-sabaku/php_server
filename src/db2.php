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
    $query = "select * from gender";
    $table = $pdo->query($query);
    echo "<table>";
    while ($row = $table->fetch()) {
        echo "<tr>";				 // 結果を表形式で表示
        echo "<td>" . $row['ID'] . "</td>";
        echo "<td>" . $row['gender'] . "</td>";
        echo "</tr>\n";
    }
    echo "</table>";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}


?>
