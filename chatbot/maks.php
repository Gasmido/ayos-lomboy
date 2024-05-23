<?php
include "../db_conn.php";
try {
    $sql = ("SELECT * FROM masked_test");
    $result = $connn -> query($sql);

    foreach ($result as $user) {
        echo "ID: " . htmlspecialchars($user['id']) . "<br>";
        echo "Email: " . $user['masked_email'] . "<br>";
        echo "Phone: " . htmlspecialchars($user['masked_password']) . "<br><br>";
    }
}catch (PDOExecption) {
    echo 'error';
}