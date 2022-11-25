<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/fontello.css">
    <link rel="stylesheet" href="/assets/css/profile.css">
    <script src="js/bootstrap.bundle.min.js"></script>
    <!-- <?php require './php/configDB.php'; ?> -->

</head>

<body>
    <!--Это нужно для того чтобы наш навбар был фиксированным и не сворачивался на странице-->
    <nav class="navbar  navbar-expand-lg fixed-top">
        <!--Создаем сам навбар-->
        <div class="container-lg container-md">
            <!--Создаем контейнер с нужными нам отступами-->
            <a class="navbar-brand m-0" href="/">
                <img src="/assets/photo/logo.svg" alt="#">
            </a>
            <!--Затем используем специальный класс для логотипов компаний или организаций-->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                <!--Дефолтная иконка бургера-->
            </button>
            <!--Все что описано в button и сам button - это создание бургера(бургер это кнопка которая создает выпадающий список)-->
            <div class="collapse navbar-collapse pt-lg-2 pt-md-2" id="navbarSupportedContent">
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
                        <a class="nav-link" href="#">О нас</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Оплата и доставка</a>
                    </li>


                </ul>
                <!--Navbar-nav-->
                <!--Контейнер для создания иконки баланса-->


                <!-- <?php 
          if(isset($_COOKIE['id'])) {
            echo '<div class="d-lg-flex flex-row">
            <span class="balance_text navbar-text me-3">Баланс</span>
            <div class="block_balance me-3 text-center">';
            echo '<span class="balance_parag">';
            echo $pdo->query("SELECT * FROM user WHERE id = ".$_COOKIE["id"]."")->fetch(PDO::FETCH_OBJ)->balance." ₽";
            echo '</span>
            </div>
            </div>';
          }
        ?> -->

                <a class="lk-and-trash me-3" href="/auth.php"><img src="/assets/photo/Иконка ЛК.svg" alt="#" width="45"
                        height="45"></a>
                <a class="lk-and-trash " href="#"><img src="/assets/photo/Иконка корзины.svg" alt="#" width="45"
                        height="45"></a>


            </div> <!-- collapse navbar-collapse -->
        </div> <!-- Container -->

    </nav> <!-- Navigtaion -->
    <div class="main">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                    <div class="tab_photo">
                        <div class="photo">
                            <div class="profile_picture"><img width="164" height="164"
                                    src="/assets/photo/profile_picture.svg" alt="#"></div>
                        </div>
                        <div id="nickname" class="fullname"> Вовчик Прикольчик</div>
                        <div class="all_button">
                            <button type="button" class="button_settings"><img src="/assets/photo/settings.svg" alt="#"
                                    width="30" height="30"></button>
                            <button type="button" class="button_exit"><img src="/assets/photo/exit.svg" alt="#"
                                    width="30" height="30"></button>
                        </div>
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
                                                    <div class="tab_mail">
                                                        <div class="block_mail">
                                                            <div class="mail_picture inline"><img
                                                                    src="/assets/photo/picture_mail.svg" alt="#"></div>
                                                            <div class="mail" id="personal_mail">
                                                                mailll@mail.ru
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
                                                                +7(922)420-25-40
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
                                                                1234 5678 9012 3456
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab_adress">
                                                        <div class="block_adress">
                                                            <div class="place_picture inline"><img
                                                                    src="/assets/photo/place.svg" alt="#" width="35"
                                                                    height="35"></div>
                                                            <div class="places">Мира 30/1, кв 36</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- заполняем второй блок вкладки - избранные ноутбуки-->
                                        <div id="tab_02" class="tabs__block lolp">
                                            <div class="block_laptop">
                                                <!-- <div class="row">
                                                  <div class="col-md-3 col-sm-3 col-xs-3"> -->
                                                <div class="for-small-screens_laptop">
                                                    <div class="laptop_picture inline" id="personal_laptop_picture">
                                                        <img src="/assets/photo/personal_picture_laptop.svg" alt="#">
                                                    </div>
                                                    <!-- </div> -->
                                                    <!-- <div class="col-md-9 col-sm-9 col-xs-9"> -->
                                                    <div class="describing_laptop inline">
                                                        <div class="name_laptop" id="personal_name_laptop">
                                                            <strong>ASER Nitro 5</strong>
                                                        </div>
                                                        <div class="parameter_laptop" id="personal_parameter_laptop">
                                                            Intel i5 (10G)/16gb/SSD GeForce 1050ti — 4gb
                                                        </div>
                                                    </div>
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
                                                    <!-- колонка под фото ноутбука-->
                                                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                                        <div class="laptop_picture inline" id="personal_laptop_picture">
                                                            <img src="/assets/photo/personal_picture_laptop.svg"
                                                                alt="#">
                                                        </div>
                                                    </div>
                                                    <!-- колонка под описание ноутбука -->
                                                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                                        <div class="name_laptop" id="personal_name_laptop">
                                                            <strong>ASER Nitro 5</strong>
                                                        </div>
                                                        <div class="parameter_laptop" id="personal_parameter_laptop">
                                                            Intel i5 (10G)/16gb/SSD GeForce 1050ti — 4gb
                                                        </div>
                                                        <div class="describing_laptop_down">
                                                            <div class="rent_dates">
                                                                <div class="text_rent_dates inline">дата аренды:</div>
                                                                <div class="start_rent_date inline"
                                                                    id="personal_start_rent_date">
                                                                    13.05.2022
                                                                </div>
                                                                <div class="minus inline">-</div>
                                                                <div class="end_rent_date inline"
                                                                    id="personal_end_rent_date">
                                                                    13.05.2022
                                                                </div>
                                                            </div>
                                                            <div class="payments_amount ">
                                                                <div class="text_payment_amount inline">сумма оплаты:
                                                                </div>
                                                                <div class="payment_amount inline"
                                                                    id="personal_payment_amount inline">
                                                                    2000
                                                                </div>
                                                                <div class="ruble inline">₽</div>
                                                            </div>
                                                        </div>
                                                    </div>
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
    <script src="assets/js/profile.js"></script>
</body>

</html>