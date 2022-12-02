<?php
    require "php/configDB.php";
    $value = $_POST["value"];
    $user_value = $pdo->query('SELECT balance FROM user WHERE id = '.$_COOKIE["id"].'')->fetch(PDO::FETCH_OBJ);
    if($value > 100000 || $value < 0){
        header("Location: /profile.php#tab_01");
    }
    else{
        $pdo->query('UPDATE user SET balance = '.($user_value->balance + $value).' WHERE id = '.$_COOKIE["id"].'');
        header("Location: /profile.php#tab_01");
    }
