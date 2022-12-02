<?php
    /*if(isset($_COOKIE["id"])){
        header("Location: /");
    }*/
    if(isset($_POST['login']) && !empty($_POST['pass'])) {
        require './php/configDB.php';

        //Защита от XSS атак
        $login = htmlspecialchars($_POST['login'], ENT_QUOTES, 'UTF-8');
        $pass = md5($_POST['pass']);

        $user = $pdo->query('SELECT * FROM user WHERE login = "'.$login.'"')->fetch(PDO::FETCH_OBJ);
        //echo "{$user}";
        if($user){

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
    }
    ?>
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
    <link rel="stylesheet" href="/assets/css/auth.css">
    <script src="js/bootstrap.bundle.min.js"></script>

</head>

<body>
   
    <div class="position-absolute top-50 start-50 translate-middle text-center container-sm"
        style="outline: 1px solid black; border-radius: 20px; margin-top: 20px; max-width: 500px">
        <div class="mb-5 mt-5">
            <div class="row">
                <div style="font-size: 40px;font-family: 'Montserrat'; font-weight: 900;">Welcome</div>
            </div>
            <div class="row">
                <a href="/"><img src="/assets/photo/logo.svg" style="width: 157px; height: 111px;"
                        class="mx-auto d-block"></a>
            </div>
        </div>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            <div class="input-group input-group-sm mx-auto mb-5 w-75 row">
                <input style="border: none; border-bottom: 1px solid; border-radius: 0px;" type="text"
                    class="justify-content-center form-control" aria-label="Sizing example input"
                    aria-describedby="inputGroup-sizing-sm" placeholder="Login" name="login">
            </div>
            <div class="input-group input-group-sm mx-auto mb-5 w-75 row">
                <input style="border: none; border-bottom: 1px solid; border-radius: 0px;" type="text"
                    class="justify-content-center form-control" aria-label="Sizing example input"
                    aria-describedby="inputGroup-sizing-sm" placeholder="Password" name="pass">
            </div>
            <?php
            if(isset($_POST['login']) && !empty($_POST['pass'])){
                if(isset($msg)){
                    echo '<div class="text-center row mb-3 justify-content-center" style="color: red;">'.$msg.'</div>';
                }
            }
        ?>
            <div class="text-center">
                <button type="submit" class="btn btn-primary w-50 btn-lg btn-dark row mb-3"
                    style="border-radius: 27px;font-family: \'Montserrat\'; font-weight: 900;">Login</button>
            </div>
        </form>
        <div class="text-center mb-5">
            <a href="#" class="link-primary" style="font-size: 15px; text-decoration: none; color: #0a58ca">Забыли
                пароль?</a>
        </div>
        <div class="mb-3">
            <div>Нет аккаунта?<a href="/register.php" class="link-primary">Зарегистрируйтесь</a></div>
        </div>
        <div class="mb-3">
            <a href="/exit.php" class="link-primary">Выйти</a>
        </div>

    </div>

</body>

</html>