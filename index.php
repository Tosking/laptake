<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;900&display=swap" rel="stylesheet"> 
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
   
    <link rel="stylesheet" href="/assets/css/style.css">
    <?php require './php/configDB.php'; ?>

</head>
<body>
  
 <!--Это нужно для того чтобы наш навбар был фиксированным и не сворачивался на странице-->
  <nav class="navbar  navbar-expand-lg"> <!--Создаем сам навбар-->
    <div class="container-lg container-md"> <!--Создаем контейнер с нужными нам отступами-->
      <a class="navbar-brand m-0" href="/">
        <img src="/assets/photo/logo.svg" alt="#">
      </a> <!--Затем используем специальный класс для логотипов компаний или организаций-->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>  <!--Дефолтная иконка бургера-->
      </button> <!--Все что описано в button и сам button - это создание бургера(бургер это кнопка которая создает выпадающий список)-->
      <div class="collapse navbar-collapse pt-lg-2 pt-md-2" id="navbarSupportedContent"> <!--Класс, в котором у нас будут располагаться элементы навбара в самом 
        бургере-->
        <ul class="navbar-nav me-auto ms-auto"> <!--Создаем список -->
          <li class="nav-item"> <!--Создаем элементы в которых будут храниться ссылки на страницы-->
            <a class="nav-link" aria-current="page" href="/">Главная</a> <!--Ну и сама страница-->
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
          
         
        </ul> <!--Navbar-nav-->
        <!--Контейнер для создания иконки баланса-->
      
        
        <?php 
          if(isset($_COOKIE['id'])) {
            echo '<div class="d-lg-flex text-center">
            <span class="balance_text navbar-text ptt">Баланс</span>
            <div class="block_balance ptt">';
            echo '<span  class="balance_parag">';
            echo $pdo->query("SELECT * FROM user WHERE id = ".$_COOKIE["id"]."")->fetch(PDO::FETCH_OBJ)->balance." ₽";
            echo '</span>
            </div>
            </div>';
          }
        ?>
        <a class = "lk-and-trash ptt" href="/auth.php"><img src="/assets/photo/Иконка ЛК.svg"  alt="#" width="45" height="45" ></a>
        <a class="lk-and-trash ptt" href="#"><img src="/assets/photo/Иконка корзины.svg" alt="#" width="45" height="45"></a>
        
        

      </div> <!-- collapse navbar-collapse -->
    </div> <!-- Container -->
    
  </nav> <!-- Navigtaion -->

  <div class="container-fluid promo_back">
    <div class="container">
    <section class="promo row gy-3 align-items-center">
      <div class="col-md-6 col-sm-4">
      <div class="block"> 
        <h1 id = "center_text_first">Дарим возможность</h1>
        <p id = "center_text_second">Готовый к использованию ноутбук с<br> доставкой на дом </p>
         </div>
         <button type="button" class="btn"><strong>Заказать в один клик</strong></button>
      </div>
      <div class="col-md-6 col-sm-7">
        <div class="block"><img src="/assets/photo/back.svg" alt="#" class="img-fluid"></div>
      </div>
    </section> <!--Section promo row-->
  </div> <!--Container-->
</div><!--Container-fluid promo_back-->

  <div class="container about_us">
    <section class="row align-items-center">

        <div class="col-md-12 col-sm-12 col-lg-6">
          <div class="block_about_us">
            <div class="row row-cols-1">
            <div class="col-md-2">
            <img src="/assets/photo/delivery.svg" alt="#">
          </div>
          <div class="col-md-7">
           <h4 class=" text_about_us_header"> Не нужно никуда идти!</h4>
           <p class="text_about_us_paragraph"> Доставим ноутбук в любое удобное для вас место</p>
          </div>
          </div>
          </div>
          </div>
         
          <div class="col-md-12 col-sm-12 col-lg-6">
            <div class="block_about_us">
              <img src="/assets/photo/quality.svg" alt="#">
              <span> Гарантия качества! </span>
            </div>
          </div>
          <div class="col-md-12 col-sm-12 col-lg-6">
            <div class="block_about_us">
              <img src="/assets/photo/quality.svg" alt="#">
              <span> Мы все починим! </span>
              <span> Мы все починим! </span>
            </div>
            </div>
            <div class="col-md-12 col-sm-12 col-lg-6">
              <div class="block_about_us">
                <img src="/assets/photo/quality.svg" alt="#">
                <span> Всегда на связи!</span>
              </div>
              </div>
    </section>
  </div><!--Container about_us-->


<footer class = "container-fluid footer">
  <div class="container">
    <div class="row pt-4">
        <div class="col-md-6 col-sm-6 col-6">
        <div class="d-inline"><img src="/assets/photo/email.svgу меня" alt="#"></div>
        <div class="d-inline"><img src="/assets/photo/phone.svg" alt="#"></div>
        </div>
      <div class="col-md-6 col-sm-6 col-6">
        <div class="d-inline"> <img src="/assets/photo/telegram_logo_icon_147228 1.svg" class = "rounded float-end"id="footer_telegnvk"  alt="#"></div>
          <div class="d-inline" > <img src="/assets/photo/vk_icon-icons 1.svg"class = "rounded float-end" id="footer_telegnvk" alt="#"></div>
      </div>
    </div><!--Row-->
  </div><!--Container-->
</footer><!--Container-fluid footer-->

  <script src="/assets/js/bootstrap.bundle.min.js"></script>
    <script src="js/app.js"></script>
</body>
</html>