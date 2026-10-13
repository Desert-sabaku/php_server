<!DOCTYPE html>
<?php
$message = $_POST['message'] ?? '';
?>

<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>XSS実験（安全版）</title>
</head>

<body>

    <h2>簡易掲示板（安全）</h2>

    <form method="POST">
        <input type="text" name="message" placeholder="コメント入力">
        <button type="submit">送信</button>
    </form>

    <hr>

    <h3>投稿内容：</h3>

    <div style="border:1px solid #000; padding:10px;">
        <?php
        // エスケープ処理
        echo htmlspecialchars($message, ENT_QUOTES, 'UTF-8');
        ?>
    </div>
</body>

</html>
