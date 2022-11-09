<?php
    require 'configDB.php';

    //Защита от XSS атак
    $login = htmlspecialchars($_POST['login'], ENT_QUOTES, 'UTF-8');
    $pass = md5(htmlspecialchars($_POST['pass'], ENT_QUOTES, 'UTF-8'));
    try {
        $user = $pdo->query('SELECT * FROM user WHERE login = '.$login.'')->fetch(PDO::FETCH_OBJ);
    }
    catch(Exception $e){
        
    }

    if(mysql_num_rows($user) == 0){
        //Такого пользователя не существует
    }
    else{
        if($user->password != $pass){
            //Неправильный пароль
        }
        else{
            setcookie("login", $login, time() + (86400 * 30 * 10), "/"); // Куки хранятся 10 дней
            setcookie("pass", $pass, time() + (86400 * 30 * 10), "/");
        }
    }
header("Location: /auth.php");
