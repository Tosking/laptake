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
    <?php
        if(isset($_POST["fname"])){
            require './php/configDB.php';
            if(empty($_POST["sname"])){
                $msg = "Введите фамилию";
            }
            elseif(empty($_POST["login"])){
                $msg = "Введите логин";
            }
            elseif(empty($_POST["email"])){
                $msg = "Введите почту";
            }
            elseif(empty($_POST["pass"])){
                $msg = "Введите пароль";
            }
            elseif(empty($_POST["confpass"])){
                $msg = "Подтвердите пароль";
            }
            else{
                if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
                    $msg = "Неправильно введен email";
                }
                elseif($_POST["pass"] != $_POST["confpass"]){
                    $msg = "Неверное подтверждение пароля";
                }
                elseif(!preg_match('/^(?=.*[A-Za-z0-9]$)[A-Za-z][A-Za-z\d.-]{1,19}$/', $_POST["login"])){
                    $msg = "Логин должен быть введен без пробелов и русских символов. Максимальная длина 19";
                }
                else {
                    $user = $pdo->query('SELECT * FROM user WHERE login = "'.$_POST["login"].'"');
                    $email = $pdo->query('SELECT * FROM user WHERE email = "'.$_POST["email"].'"');
                    if(!$user && !$email){
                        $sql = 'INSERT INTO user (name, surname, login, email, password, balance) VALUES ("'.$_POST["fname"].'" , "'.$_POST["sname"].'", "'.$_POST["login"].'" , "'.$_POST["email"].'" , "'.md5($_POST["pass"]).'", 0)';
                        $pdo->query($sql);
                    }
                    else{
                        $msg = "Такой аккаунт уже существует";
                    }
                }
            }
            
        }
    ?>
    <div class="position-absolute top-50 start-50 translate-middle text-center container-sm" style="outline: 1px solid black; border-radius: 20px; margin-top: 20px; max-width: 500px">
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
                <input type="text" class="justify-content-center form-control reg_place" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Имя" name="fname">
            </div>
            <div class="input-group input-group-sm mx-auto mb-5 w-75 row">
                <input type="text" class="justify-content-center form-control reg_place" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Фамилия" name="sname">
            </div>
            <div class="input-group input-group-sm mx-auto mb-5 w-75 row">
                <input type="text" class="justify-content-center form-control reg_place" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Логин" name="login">
            </div>
            <div class="input-group input-group-sm mx-auto mb-5 w-75 row">
                <input type="text" class="justify-content-center form-control reg_place" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Email" name="email">
            </div>
            <div class="input-group input-group-sm mx-auto mb-5 w-75 row">
                <input type="text" class="justify-content-center form-control reg_place" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Пароль" name="pass">
            </div>
            <div class="input-group input-group-sm mx-auto mb-5 w-75 row">
                <input type="text" class="justify-content-center form-control reg_place" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Подтвердите пароль" name="confpass">
            </div>
        <?php
            if(isset($msg)){
                echo '<div class="text-center w-50 row mb-3 justify-content-lg-center" style="color: red;">'.$msg.'</div>';
            }
        ?>
        <div class="text-center">
            <button type="submit" class="btn btn-primary w-50 btn-lg btn-dark row mb-3" style="border-radius: 27px;font-family: \'Montserrat\'; font-weight: 900;">Регистрация</button>
        </div>
        </form>
        <div class="mb-3">
            <div>Есть аккаунт?<a href="/auth.php" class="link-primary">Войдите</a></div>
        </div>
        
    </div>

</body>
</html>