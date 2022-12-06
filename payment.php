<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;900&display=swap" rel="stylesheet">
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="/assets/css/payment.css">
    <link rel="stylesheet" href="/assets/css/main.css">
    <?php require './php/configDB.php'; ?>

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
    <script src="js/app.js"></script>
</body>

</html>