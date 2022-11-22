<?php
    //Загрузка логина и пароля из файла db_credentials.json
    $json_file = file_get_contents("php/db_credentials.json");
    $credentials = json_decode($json_file);

    $dsn = 'mysql:host=localhost;dbname=laptake';
    $pdo = new PDO($dsn, $credentials->login, $credentials->pass);

