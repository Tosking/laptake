<?php
    require "php/configDB.php";
    $end = $_POST["end"];
    $start = $_POST["start"];
    if(strtotime($end) <= strtotime($start)){
        header('Location: /');
    }
    else{
        $days_diff = (strtotime($end) - strtotime($start)) / 60 * 60 * 24;
        $balance = $pdo->query('SELECT balance FROM user WHERE id = '.$_COOKIE["id"])->fetch(PDO::FETCH_OBJ);
        $laptop = $pdo->query('SELECT * FROM laptop WHERE id = '.$_POST["laptop"])->fetch(PDO::FETCH_OBJ);
        $end_value = 0;
        if($days_diff == 1){
            $end_value = $laptop->price / 30 * 6;
        }
        else if($days_diff == 2){
            $end_value = $laptop->price / 30 * 4;
        }
        else if($days_diff <= 6){
            $end_value = $laptop->price / 30 * 2;
        }
        else if($days_diff <= 30){
            $end_value = $laptop->price / 30 * 1.5;
        }
        else {
            $end_value = $laptop->price / 30;
        }
        if($balance->balance < $end_value){
            //header('Location: /');
        }
        else{
            $tUnixTime = time();
            $sGMTMySqlString = gmdate("Y-m-d H:i:s", $tUnixTime);
            $pdo->query('INSERT INTO payments(user,value,date,payment_choose) VALUES ('.$_COOKIE["id"].','.$end_value.',"'.$sGMTMySqlString.'", 1)');
            $payment_id = $pdo->query('SELECT id FROM payments WHERE date = "'.$sGMTMySqlString.'"')->fetch(PDO::FETCH_OBJ);
            $copy = $pdo->query('SELECT id FROM copy WHERE model = '.$laptop->id.' AND rent_ready = 1')->fetch(PDO::FETCH_OBJ);
            $pdo->query('INSERT INTO renting(user,copy,payment_id,start,end) VALUES ('.$_COOKIE["id"].','.$copy->id.','.$payment_id->id.',"'.$start.'","'.$end.'")');
            $pdo->query('UPDATE copy SET rent_ready = 1 WHERE id = '.$copy->id);
        }
    }