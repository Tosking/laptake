<?php
    //Загрузка логина и пароля из файла db_credentials.json
    $json_file = file_get_contents("php/db_credentials.json");
    $credentials = json_decode($json_file);

    $dsn = 'mysql:host=92.246.214.15:3306;dbname=ais_sinkevich1858_laptake';
    $pdo = new PDO($dsn, $credentials->login, $credentials->pass);

