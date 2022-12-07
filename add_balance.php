<?php
    require "php/configDB.php";
    $value = $_POST["value"];
    $user_value = $pdo->query('SELECT balance FROM user WHERE id = '.$_COOKIE["id"].'')->fetch(PDO::FETCH_OBJ);
    if($value > 100000 || $value < 0){
        header("Location: /profile.php#tab_01");
    }
    else{
        $tUnixTime = time();
        $sGMTMySqlString = gmdate("Y-m-d H:i:s", $tUnixTime);
        $pdo->query('UPDATE user SET balance = '.($user_value->balance + $value).' WHERE id = '.$_COOKIE["id"].'');
        $pdo->query('INSERT INTO payments(user,value,date,payment_choose) VALUES ('.$_COOKIE["id"].','.$value.',"'.$sGMTMySqlString.'", 1)');
        header("Location: /profile.php#tab_01");
    }
