<html>

<head>
    <meta charset="utf-8">
    <title>コンピュータ関連図書</title>
</head>

<body>
    <?php
    try {
        $kw = $_POST["key"];
        $conn = new PDO(
            "mysql:host=mysql;dbname=sample;charset=utf8mb4",
            "user",
            "password",
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ]
        );
        $sql = "select * from newbook where title LIKE '%$kw%' or author LIKE '%$kw%'";
        $rs = $conn->query($sql);
        echo "<table border =1>";
        echo "<tr><th>図書番号</th><th>タイトル</th><th>著者</th>";
        echo "<th>出版者・社</th><th>発行年月</th><th>所在</th></tr>";

        while ($row = $rs->fetchObject()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row->id_no, ENT_QUOTES, 'UTF-8') . "</td>";
            echo "<td>" . htmlspecialchars($row->title, ENT_QUOTES, 'UTF-8') . "</td>";
            echo "<td>" . htmlspecialchars($row->author, ENT_QUOTES, 'UTF-8') . "</td>";
            echo "<td>" . htmlspecialchars($row->publisher, ENT_QUOTES, 'UTF-8') . "</td>";
            echo "<td>" . htmlspecialchars($row->date, ENT_QUOTES, 'UTF-8') . "</td>";
            echo "<td>" . htmlspecialchars($row->place, ENT_QUOTES, 'UTF-8') . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } catch (PDOException $e) {
        // エラーが発生した場合，終了
        exit($e->getMessage());
    }
    ?>
</body>

</html>
