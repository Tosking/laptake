<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;900&display=swap" rel="stylesheet"> 
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/fontello.css">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/auth.css">
    <script src="js/bootstrap.bundle.min.js"></script>

</head>
<body>
<?php
    if(isset($_POST['login']) && !empty($_POST['pass'])) {
        require './php/configDB.php';

        //Защита от XSS атак
        $login = htmlspecialchars($_POST['login'], ENT_QUOTES, 'UTF-8');
        $pass = md5(htmlspecialchars($_POST['pass'], ENT_QUOTES, 'UTF-8'));

        $user = $pdo->query('SELECT * FROM user WHERE login = '.$login.'');
        if($user != 0){
            $user = $user->fetch(PDO::FETCH_OBJ);
            if($user->password != $pass){
                $msg = "Неверный логин или пароль";
            }
            else{
                setcookie("id", $user->id, time() + (86400 * 30 * 10), "/"); // Куки хранятся 10 дней
            }
        }
        else{
            $msg = "Неверный логин или пароль";
        }
        if(isset($_COOKIE["id"])){
            header("Location: /index.html");
        }
    }
?>
    <div class="position-absolute top-50 start-50 translate-middle text-center container" style="outline: 1px solid black; border-radius: 20px;">
    <?php
        
    ?>
        <div class="mb-5 mt-5">
            <div class="row">
                <div style="font-size: 40px;font-family: 'Montserrat'; font-weight: 900;">Welcome</div>
            </div>
            <div class="row">
                <img src="/assets/photo/logo.svg" style="width: 157px; height: 111px;" class="mx-auto d-block"> 
            </div>
        </div>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            <div class="input-group input-group-sm mx-auto mb-5 w-75 row">
                <input style="border: none; border-bottom: 1px solid; border-radius: 0px;" type="text" class="justify-content-center form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Email" name="login">
            </div>
            <div class="input-group input-group-sm mx-auto mb-5 w-75 row">
                <input style="border: none; border-bottom: 1px solid; border-radius: 0px;" type="text" class="justify-content-center form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Password" name="pass">
            </div>
        <?php
            if(isset($_POST['login']) && !empty($_POST['pass'])){
                if(isset($msg)){
                    echo '<div class="text-center w-50 row mb-3" style="color: red;">'.$msg.'</div>';
                }
            }
        ?>
        <div class="text-center">
            <button type="submit" class="btn btn-dark w-50 row mb-3" style="border-radius: 27px; font-size: 20px;font-family: \'Montserrat\'; font-weight: 900;">Login</button>
        </div>
        </form>
        <div class="text-center mb-5">
            <a href="#" class="link-primary" style="font-size: 15px; text-decoration: none; color: #0a58ca">Забыли пароль?</a>
        </div>
        <div class="mb-3">
            <div>Нет аккаунта?<a href="#" class="link-primary">Зарегистрируйтесь</a></div>
        </div>
        
    </div>

</body>
</html>