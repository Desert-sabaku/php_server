<?php
$dsn = 'mysql:host=localhost;dbname=sample;charset=utf8';
$user = 'user';
$pass = 'password';

$pdo = new PDO($dsn, $user, $pass);

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
$stmt = $pdo->query($sql);

echo "<div class='result'>";

if ($stmt->rowCount() > 0) {
    echo " ログイン成功（脆弱）";
} else {
    echo " ログイン失敗";
}

echo "</div>";
?>
