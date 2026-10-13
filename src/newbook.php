<html>

<head>
    <meta charset="utf-8">
    <title>コンピュータ関連図書</title>
</head>

<body>
    <?php
    try {
        // $conn = new PDO("mysql:host=localhost; dbname=gXXXXX_db; charset=utf8", "gXXXXX", "pw-php-DB");
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
        $sql = "select * from newbook";
        $rs = $conn->query($sql);
        echo "<table border=1>";
        echo "<tr><th>図書番号</th><th>タイトル</th><th>著者</th>";
        echo "<th>出版者・社</th><th>発行年月</th><th>所在</th></tr>";


        while ($row = $rs->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . $row['id_no'] . "</td>";
            echo "<td>" . $row['title'] . "</td>";
            echo "<td>" . $row['author'] . "</td>";
            echo "<td>" . $row['publisher'] . "</td>";
            echo "<td>" . $row['date'] . "</td>";
            echo "<td>" . $row['place'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } catch (PDOException $e) {
        // エラーが発生した場合
        exit($e->getMessage());
    }
    ?>
</body>

</html>
