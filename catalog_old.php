<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;900&display=swap" rel="stylesheet">
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="/assets/css/catalog.css">
    <?php require './php/configDB.php'?>

</head>

<body>

    <!--Это нужно для того чтобы наш навбар был фиксированным и не сворачивался на странице-->
    <nav class="navbar navbar-expand-lg">
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

                <div class="d-lg-flex text-center">
                    <span class="balance_text navbar-text ptt">Баланс</span>
                    <div class="block_balance ptt">
                        <span class="balance_parag">63 089</span>
                    </div>
                </div>

                <a class="lk-and-trash ptt" href="/auth.php"><img src="/assets/photo/Иконка ЛК.svg" alt="#" width="45"
                        height="45"></a>
                <a class="lk-and-trash ptt" href="/cart.php"><img src="/assets/photo/Иконка корзины.svg" alt="#" width="45"
                        height="45"></a>



            </div> <!-- collapse navbar-collapse -->
        </div> <!-- Container -->

    </nav> <!-- Navigtaion -->

    <!-- FIRST SECTION -->

    <section class="main">
        <div class="container">
            <div class="main-info">
                <h1 class="title">Подбери свой ноутбук </h1>
                <div class="main-buttons">
                    <button class="button">Игровой</button>
                    <button class="button">Офисный</button>
                    <button class="button">Для учебы</button>
                    <button class="button">Универсальные</button>
                </div>
                <h1 class="title">Мы вам рекомендуем</h1>
                <div class="laptop-items">
                    <div class="laptop-item">
                        <img src="/assets/photo/laptake-main-section.svg" alt="laptop" class="image-laptop">
                        <div class="laptop-description">Ноутбук ASUS TUF Dash FX517ZR-F15 Intel i7-12650H/16G/512G
                            SSD/15,6" FHD 144Hz/GeForce RTX™ 3070 8G/Win11 en/rus Черный</div>
                        <div class="order-colum">
                            <div class="order-text">от 350₽/сут.</div>
                            <div class="order">
                                <button class="button">Заказать</button>
                                <button class="favorite-tip">
                                    <img src="/assets/photo/favorite-tip.svg" alt="favorite">
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="laptop-item">
                        <img src="/assets/photo/laptake-main-section.svg" alt="laptop" class="image-laptop">
                        <div class="laptop-description">Ноутбук ASUS TUF Dash FX517ZR-F15 Intel i7-12650H/16G/512G
                            SSD/15,6" FHD 144Hz/GeForce RTX™ 3070 8G/Win11 en/rus Черный</div>
                        <div class="order-colum">
                            <div class="order-text">от 350₽/сут.</div>
                            <div class="order">
                                <button class="button">Заказать</button>
                                <button class="favorite-tip">
                                    <img src="/assets/photo/favorite-tip.svg" alt="favorite">
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="sale">
        <div class="container">
            <div class="sale-info">
                <div class="sale-main-text">
                    <h1 class="sale-title">АКЦИЯ</h1>
                    <h2 class="sale-text">Получи геймерский набор в подарок*</h2>
                    <h3 class="sale-condition">*Акция действительна при покупке ноутбука от 8000Р</h3>
                </div>
                <img src="/assets/photo/sale-image1.svg" alt="sale-img" class="sale-image">
            </div>
        </div>
    </section>

    <section class="catalog">
        <div class="container">
            <div class="main-info">
                <h1 class="title">ВСЕ НОУТБУКИ</h1>
                <div class="laptop-items">
                    <?php
                        $query = $pdo->query('SELECT * FROM `laptop`');
                        while($row = $query->fetch(PDO::FETCH_OBJ)){
                            echo '<div class="laptop-item">
                            <img src="'.$row->picture.'" alt="laptop" class="image-laptop">
                            <ul>
                            <div class="laptop-description"> '.$row->description.' </div>
                            <div class="order-colum">
                                <div class="order-text" >от '.$row->price.'₽/сут.</div>
                                <button class="button">Заказать</button>
                                <button class="favorite-tip">
                                    <img src="/assets/photo/favorite-tip.svg" alt="favorite">
                                </button>
                            </div>
                        </ul>
                        </div> 
                        ';}?>
                    <div class="laptop-item">
                        <img src="/assets/photo/laptake-main-section.svg" alt="laptop" class="image-laptop">
                        <ul>
                            <div class="laptop-description">Ноутбук ASUS TUF Dash FX517ZR-F15 Intel i7-12650H/16G/512G
                                SSD/15,6" FHD 144Hz/GeForce RTX™ 3070 8G/Win11 en/rus Черный</div>
                            <div class="order-colum">
                                <div class="order-text">от 350₽/сут.</div>
                                <button class="button">Заказать</button>
                                <button class="favorite-tip">
                                    <img src="/assets/photo/favorite-tip.svg" alt="favorite">
                                </button>
                            </div>
                        </ul>
                    </div>
                    <div class="laptop-item">
                        <img src="/assets/photo/laptake-main-section.svg" alt="laptop" class="image-laptop">
                        <ul>
                            <div class="laptop-description">Ноутбук ASUS TUF Dash FX517ZR-F15 Intel i7-12650H/16G/512G
                                SSD/15,6" FHD 144Hz/GeForce RTX™ 3070 8G/Win11 en/rus Черный</div>
                            <div class="order-colum">
                                <div class="order-text">от 350₽/сут.</div>
                                <button class="button">Заказать</button>
                                <button class="favorite-tip">
                                    <img src="/assets/photo/favorite-tip.svg" alt="favorite">
                                </button>
                            </div>
                        </ul>
                    </div>
                    <div class="laptop-item">
                        <img src="/assets/photo/laptake-main-section.svg" alt="laptop" class="image-laptop">
                        <ul>
                            <div class="laptop-description">Ноутбук ASUS TUF Dash FX517ZR-F15 Intel i7-12650H/16G/512G
                                SSD/15,6" FHD 144Hz/GeForce RTX™ 3070 8G/Win11 en/rus Черный</div>
                            <div class="order-colum">
                                <div class="order-text">от 350₽/сут.</div>
                                <button class="button">Заказать</button>
                                <button class="favorite-tip">
                                    <img src="/assets/photo/favorite-tip.svg" alt="favorite">
                                </button>
                            </div>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class = "container-fluid footer ">
  <div class="container">
    <div class="row pt-4 pb-4">
        <div class="col-lg-3 col-md-5 col-sm-5 col-12 pt-2">
          <img src="/assets/photo/email.svg"width="205" height="28" alt="#">
      </div>
      <div class="col-lg-3 col-md-5 pt-2 col-sm-5 col-12 ">
      <img src="/assets/photo/phone.svg" width="205" height="28" alt="#"> 
    </div>
      <div class="col-lg-5 col-md-1 col-sm-1 col-2">
        <img src="/assets/photo/telegram_logo_icon_147228 1.svg" class = "rounded float-end"id="footer_telegnvk"  alt="#">
        
      </div>
      <div class="col-lg-1 col-md-1 col-sm-1 col-2">
         <img src="/assets/photo/vk_icon-icons 1.svg"class = "rounded float-end" id="footer_telegnvk" alt="#">
      </div>
    </div><!--Row-->
  </div><!--Container-->
</footer><!--Container-fluid footer-->

    <script src="/assets/js/bootstrap.bundle.min.js"></script>
    <script src="js/app.js"></script>
</body>

</html>