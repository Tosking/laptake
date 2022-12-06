<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" type="image/x-icon" href="/assets/photo/favicon.png">
    <title>Профиль</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;900&display=swap" rel="stylesheet">
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/fontello.css">
    <link rel="stylesheet" href="/assets/css/main.css">
    <link rel="stylesheet" href="/assets/css/profile.css">
    <script src="js/bootstrap.bundle.min.js"></script>
    <!-- <?php require './php/configDB.php'; ?> -->

</head>

<body>
   <!--Это нужно для того чтобы наш навбар был фиксированным и не сворачивался на странице-->
<nav class="navbar  navbar-expand-xl fixed-top">
        <!--Создаем сам навбар-->
        <div class="container">
            <!--Создаем контейнер с нужными нам отступами-->
            <a class="navbar-brand m-0" href="/">
                <img src="/assets/photo/logo.svg" alt="#">
            </a>
            <!--Затем используем специальный класс для логотипов компаний или организаций-->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
            data-bs-target="#navbarNav" aria-controls="navbarNav" 
            aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"><img src="/assets/photo/gamburger.png" width="30" height="30" alt=""></span>
            </button>
            <!--Все что описано в button и сам button - это создание бургера(бургер это кнопка которая создает выпадающий список)-->
            <div class="collapse navbar-collapse pt-lg-2 pt-md-2 text-center" id="navbarNav">
                <!--Класс, в котором у нас будут располагаться элементы навбара в самом бургере-->
                <ul class="navbar-nav me-auto ms-auto">
                    <!--Создаем список -->
                    <li class="nav-item">
                        <!--Создаем элементы в которых будут храниться ссылки на страницы-->
                        <a class="nav-link" aria-current="page" href="/">Главная</a>
                        <!--Ну и сама страница-->
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/catalog.php">Каталог</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/aboutus.php">О нас</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Оплата и доставка</a>
                    </li>


                </ul>
                <!--Navbar-nav-->
                <!--Контейнер для создания иконки баланса-->


                <?php 
                  if(isset($_COOKIE['id'])) {
                    echo '<div class="d-inline-flex balance pt-1">
                    <span class="balance_text navbar-text me-3">Баланс</span>
                    <div class="block_balance me-3 text-center">';
                    echo '<span class="balance_parag">';
                    echo $pdo->query("SELECT * FROM user WHERE id = ".$_COOKIE["id"]."")->fetch(PDO::FETCH_OBJ)->balance." ₽";
                    echo '</span>
                    </div>
                    </div>';
                  }
                ?>
                <div class="d-inline-flex pt-1">
                <a class="lk-and-trash me-3" href="<?php if(isset($_COOKIE["id"])) echo '/profile.php#tab_01'; else echo '/auth.php';?>"><img src="/assets/photo/Иконка ЛК.svg" alt="#" width="45"
                        height="45"></a>
                <a class="lk-and-trash " href="/cart.php"><img src="/assets/photo/Иконка корзины.svg" alt="#" width="45"
                        height="45"></a>
                </div>

            </div> <!-- collapse navbar-collapse -->
        </div> <!-- Container -->

    </nav> <!-- Navigtaion -->
    <div class="main">
        <div class="container">
            <div class="row">
                <div class="tab_photo col-lg-3 col-md-12 col-sm-12 col-xs-12">
                    <div class="photo">
                        <div class="profile_picture">
                            <?php
                                $pic = $pdo->query('SELECT picture FROM user WHERE id = '.$_COOKIE["id"].'')->fetch(PDO::FETCH_OBJ)->picture;
                                if($pic == NULL){
                                    echo '<img width="164" height="164" src="/assets/photo/default_profile.jpeg" alt="#" style="border-radius: 50%">';
                                }
                                else{
                                    echo '<img width="164" height="164" src="'.$pic.'" alt="#" style="border-radius: 50%">';
                                }
                            ?>
                        </div>
                    </div>
                    <div id="nickname" class="fullname"><?php $name = $pdo->query('SELECT * FROM user WHERE id ='.$_COOKIE["id"].'')->fetch(PDO::FETCH_OBJ);
                     echo $name->name.' '; echo $name->surname; ?></div>
                    <div class="all_button">
                        <button type="button" class="button_settings mt-3"><img src="/assets/photo/settings.svg" alt="#"
                                width="30" height="30"></button>
                        <button type="button" class="button_exit mt-3"><img src="/assets/photo/exit.svg" alt="#"
                                width="30" height="30"></button>
                        <form method="post" action="/add_balance.php">
                            <input type="text" class="col-12 mt-3 p-1 mb-2" name="value" placeholder="₽">
                            <div class="text-center" style="font-size: 10px">Введите значение меньше 100 тыс.</div>
                            <button type="submit" class="col-12 mt-1 p-1 mb-2" style="color: #ffffff; font-weight:900">Пополнить баланс</button>
                        </form>
                    </div>
                </div>
                <div class=" col-lg-9 col-md-12 col-sm-12 col-xs-12">
                    <div class="container">
                        <div class="wrapper">
                            <div class="content">
                                <div class="tabs">
                                    <nav class="tabs__items">
                                        <a href="#tab_01" class="tabs__item"><span>
                                                <div class="for-small-screens"><img
                                                        src="/assets/photo/personal_information.svg" alt="#"></div>
                                                <div class="for-large-screens">Личная информация</div>
                                            </span></a>
                                        <a href="#tab_02" class="tabs__item"><span>
                                                <div class="for-small-screens"><img src="/assets/photo/heart.svg"
                                                        alt="#"></div>
                                                <div class="for-large-screens">Избранное</div>
                                            </span></a>
                                        <a href="#tab_03" class="tabs__item"><span>
                                                <div class="for-small-screens"><img src="/assets/photo/history.svg"
                                                        alt="#"></div>
                                                <div class="for-large-screens">Заказы</div>
                                            </span></a>
                                    </nav>
                                    <div class="tabs__body">
                                        <div id="tab_01" class="tabs__block">
                                            <div class="container">
                                                <!-- заполняем первый блок вкладки -->
                                                <div class="tab_01_blocks">
                                                    <!-- блок почты -->
                                                    <?php
                                                    $info = $pdo->query('SELECT * FROM user WHERE id ='.$_COOKIE["id"].'')->fetch(PDO::FETCH_OBJ);
                                                    $phone = "///";
                                                    $address = "///";
                                                    $card = "///";
                                                    if($info->phone != NULL){
                                                        $phone = $info->phone;
                                                    }
                                                    if($info->card != NULL){
                                                        $card = $info->card;
                                                    }
                                                    if($info->address != NULL){
                                                        $address = $info->address;
                                                    }
                                                    echo'
                                                    <div class="tab_mail">
                                                        <div class="block_mail">
                                                            <div class="mail_picture inline"><img
                                                                    src="/assets/photo/picture_mail.svg" alt="#"></div>
                                                            <div class="mail" id="personal_mail">
                                                                '.$info->email.'
                                                            </div>
                                                        </div>
                                                        <!-- кнопка редактирования всего -->
                                                    </div>
                                                    <!-- блок телефона -->
                                                    <div class="tab_phone">
                                                        <div class="block_phone">
                                                            <div class="phone_picture inline"><img
                                                                    src="/assets/photo/picture_phone.svg" alt="#"></div>
                                                            <div class="phone" id="personal_phone">
                                                                '.$phone.'
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- блок карт -->
                                                    <div class="tab_card">
                                                        <div class="block_card">
                                                            <div class="card_picture inline"><img
                                                                    src="/assets/photo/picture_card.svg" alt="#"
                                                                    width="35" height="35"></div>
                                                            <div class="cards" id="personal_card">
                                                                '.$card.'
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab_adress">
                                                        <div class="block_adress">
                                                            <div class="place_picture inline"><img
                                                                    src="/assets/photo/place.svg" alt="#" width="35"
                                                                    height="35"></div>
                                                            <div class="places">'.$address.'</div>
                                                        </div>
                                                    </div>
                                                    ';?>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- заполняем второй блок вкладки - избранные ноутбуки-->
                                        <div id="tab_02" class="tabs__block lolp">
                                            <div class="block_laptop">
                                                <!-- <div class="row">
                                                  <div class="col-md-3 col-sm-3 col-xs-3"> -->
                                                <?php
                                                    $favorite = $pdo->query('SELECT favorite FROM user WHERE id ='.$_COOKIE["id"].'')->fetch(PDO::FETCH_OBJ)->favorite;
                                                    if($favorite == NULL){
                                                        echo '<div class="container mt-2 p-2 pt-2 text-center" style="background: #cccccc; border-radius:20px">
                                                            <div class="h1 m-5" style="color: #555555; font-size: clamp(10px, 5vw, 30px)">В избранном пока пусто</p>
                                                        </div>';
                                                    }
                                                    else{
                                                        $favorite = json_decode($favorite);
                                                        foreach($favorite as $favorite){
                                                            $laptop = $pdo->query('SELECT * FROM laptop WHERE id = '.$favorite.'')->fetch(PDO::FETCH_OBJ);
                                                            echo '
                                                            <div class="container">
                                                                <div class="row mt-1 p-3 text-center laptop" style="border-radius:20px; background-color: #cccccc">
                                                                    <img src="'.$laptop->picture.'" class="col" style="width: 154px; height:154px;">
                                                                    <div class="col-sm-7">
                                                                        <div class="align-self-start" style="font-weight: 600">'.$laptop->name.'</div>
                                                                        <div class="row font-weight-normal">'.$laptop->description.'</div>
                                                                    </div>
                                                                    <div class="col align-self-center">
                                                                        <button class="col align-self-center btn btn-primary btn-sm btn-dark" style="font-size: clamp(20px, 5vw, 30px); border-radius:20px">Заказать</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            ';
                                                        }
                                                    }
                                                    ?>
                                                    <!-- </div>
                                                  </div> -->
                                                </div>
                                            </div>
                                        </div>
                                        <!-- заполняем третий блок вкладки -->
                                        <div id="tab_03" class="tabs__block">
                                            <!-- <div class="container"> -->
                                            <div class="block_laptop">
                                                <div class="row for-small-screens_laptop">
                                                        <?php
                                                        $history = $pdo->query('SELECT * FROM renting WHERE user = '.$_COOKIE["id"].'');
                                                        while($row = $history->fetch(PDO::FETCH_OBJ)){
                                                            $copy = $pdo->query('SELECT model FROM copy WHERE id = '.$row->copy.'')->fetch(PDO::FETCH_OBJ);
                                                            $laptop = $pdo->query('SELECT * FROM laptop WHERE id = '.$copy->model.'')->fetch(PDO::FETCH_OBJ);
                                                            $payment = $pdo->query('SELECT value FROM payments WHERE id = '.$row->payment_id.'')->fetch(PDO::FETCH_OBJ);
                                                            echo'
                                                            <!-- колонка под фото ноутбука-->
                                                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                                            <div class="laptop_picture inline" id="personal_laptop_picture">
                                                                <img src="'.$laptop->picture.'"
                                                                    alt="#" style="height: 154px; width: 154px">
                                                            </div>
                                                        </div>
                                                        <!-- колонка под описание ноутбука -->
                                                        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                                            <div class="name_laptop" id="personal_name_laptop">
                                                                <strong>'.$laptop->name.'</strong>
                                                            </div>
                                                            <div class="parameter_laptop" id="personal_parameter_laptop">
                                                                '.$laptop->description.'
                                                            </div>
                                                            <div class="describing_laptop_down">
                                                                <div class="rent_dates">
                                                                    <div class="text_rent_dates inline">Дата аренды:</div>
                                                                    <div class="start_rent_date inline"
                                                                        id="personal_start_rent_date">
                                                                        '.$row->start.'
                                                                    </div>
                                                                    <div class="minus inline">-</div>
                                                                    <div class="end_rent_date inline"
                                                                        id="personal_end_rent_date">
                                                                        '.$row->end.'
                                                                    </div>
                                                                </div>
                                                                <div class="payments_amount ">
                                                                    <div class="text_payment_amount inline">сумма оплаты:
                                                                    </div>
                                                                    <div class="payment_amount inline"
                                                                        id="personal_payment_amount inline">
                                                                        '.$payment->value.'
                                                                    </div>
                                                                    <div class="ruble inline">₽</div>   
                                                                </div>
                                                            </div>
                                                        </div>';
                                                        }?>                                                   
                                                </div>
                                            </div>
                                            <!-- </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    </div>
    <footer class = "container-fluid footer">
  <div class="container">
    <div class="row pt-4 pb-4">
        <div class="col-lg-3 col-md-5 col-sm-12 col-12 pt-2 ">
          <img src="/assets/photo/email.svg"  width="205" height="28" alt="#">
      </div>
      <div class="col-lg-3 col-md-5 pt-2 col-sm-12 col-12 ">
      <img src="/assets/photo/phone.svg"  width="205" height="28"alt="#"> 
    </div>
      <div class="telegvk col-lg-5 col-md-1 col-sm-12 col-12">
        <img src="/assets/photo/telegram_logo_icon_147228 1.svg" id="footer_telegnvk"  alt="#">
        
      </div>
      <div class="telegvk col-lg-1 col-md-1 col-sm-12 col-12">
         <img src="/assets/photo/vk_icon-icons 1.svg"id="footer_telegnvk" alt="#">
      </div>
    </div><!--Row-->
  </div><!--Container-->
</footer><!--Container-fluid footer-->

    <script src="/assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/profile.js"></script>
</body>

</html>