<?php
require './php/configDB.php';
if(!isset($_COOKIE["id"])){
    header("Location: /auth.php");
}
else{
    $favorited = $pdo->query('SELECT favorite FROM user WHERE id = '.$_COOKIE["id"])->fetch(PDO::FETCH_OBJ)->favorite;
    if($favorited != NULL){
        $favorited = json_decode($favorited);
        if(($key = array_search(intval($_POST["id"]), $favorited)) !== FALSE){
            array_splice($favorited, $key, 1);
            echo "1";
        }
        else{
            array_push($favorited, intval($_POST["id"]));
            echo "0";
        }
        $pdo->query('UPDATE user SET favorite = "'.json_encode($favorited).'" WHERE id = '.$_COOKIE["id"]);
    }
    else{
        $pdo->query('UPDATE user SET favorite = "'.'['.$_POST["id"].']'.'" WHERE id = '.$_COOKIE["id"]);
    }
}
