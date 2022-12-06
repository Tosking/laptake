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
    <div class="container" style="margin-top: 200px">              
    <?php
        $time = time();
        $date = gmdate("Y-m-d", $time);
        $date_max_start = gmdate("Y-m-d", $time + (60 * 60 * 24 * 7));
        $date_min_end = gmdate("Y-m-d", $time + (60 * 60 * 24 * 2));
        $date_max_end = gmdate("Y-m-d", $time + (60 * 60 * 24 * 365));
        $laptop = $pdo->query('SELECT * FROM laptop WHERE id = '.$_GET["laptop"])->fetch(PDO::FETCH_OBJ);
        echo '
            <input value='.$laptop->price.' id="value" style="display: none;">
            <div class="row mt-3 mb-3 p-3 text-center laptop" style="border-radius:20px">
                <img src="'.$laptop->picture.'" class="col-1" style="width: 154px; height:154px;">
                <div class="col-sm-7">
                    <div class="align-self-start" style="font-weight: 600">'.$laptop->name.'</div>
                    <div class="row font-weight-normal m-1">'.$laptop->description.'</div>
                </div>
                <div class="col-12 align-self-center">
                    <form method="post" action="/payment_pars.php">
                        <input value='.$laptop->id.' name="laptop" style="display: none;">
                        <div class="row justify-content-center mt-3 mb-1">
                            <div class="col">
                                <div class="b">Когда привезти:</div>
                                <input onchange="calc_value()" class="date" type="date" id="start" name="start"
                                value="'.$date.'"
                                min="'.$date.'" max="'.$date_max_start.'">
                            </div>
                            <div class="col">
                                <div class="text-center b">Когда забрать:</div>
                                <input onchange="calc_value()" class="date" type="date" id="end" name="end"
                                value="'.$date_min_end.'"
                                min="'.$date_min_end.'" max="'.$date_max_end.'">
                            </div>
                            <div class="col">
                                <div class="text-center b">Итоговая цена</div>
                                <p class="h2" id="end_value"></p>                           
                            </div>
                        </div>
                        <button type="submit" class="col align-self-center btn btn-primary btn-sm btn-dark" style="font-size: clamp(20px, 5vw, 30px)">Оплатить</button>
                    </form>
                </div>
            </div>'
    ?>
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
    <script src="/assets/js/payment.js"></script>
</body>

</html>