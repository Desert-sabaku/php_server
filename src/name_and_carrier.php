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
    $table1 = $pdo->query("select * from carrier");
    $name_query = <<<EOT
    SELECT
        n.name,
        n.phone_number,
        n.email_address,
        c.carrier
    FROM `name` AS n
    JOIN carrier AS c
        ON n.carrier_id = c.id;
    EOT;
    $table2 = $pdo->query($name_query);

    echo "<table border=2>";
    echo "<tr><th>carrier</th><th>name</th></tr>";
    while ($row1 = $table1->fetch()) {
        echo "<tr>";				 // 結果を表形式で表示
        echo "<td>" . $row1['carrier'] . "</td>";
        echo "<td>" . $row1['domain'] . "</td>";
        echo "</tr>\n";
    }
    echo "</table>";
    echo "<table border=2>";
    echo "<tr><th>name</th><th>phone_number</th><th>email</th><th>carrier</th></tr>";
    while ($row2 = $table2->fetch()) {
        echo "<tr>";				 // 結果を表形式で表示
        echo "<td>" . $row2['name'] . "</td>";
        echo "<td>" . $row2['phone_number'] . "</td>";
        echo "<td>" . $row2['email_address'] . "</td>";
        echo "<td>" . $row2["carrier"] . "</td>";
        echo "</tr>\n";
    }
} catch (\Throwable $th) {
    //throw $th;
}
