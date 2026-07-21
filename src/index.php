<?php
    echo $_SERVER["HTTP_USER_AGENT"];

    if (str_contains($_SERVER['HTTP_USER_AGENT'], 'Edg')) {
        echo 'あなたはEdgeを使用しています';
    }


?>

