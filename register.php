<?php
session_start();
?>

<!doctype html>
<html lang="en">
    <meta charset="UTF-8">
    <title>Регистрация</title>
    <link rel="stylesheet" href="view/css/main.css">
</head>
    <body>
        <form action="connect/registerConnect.php" method="post">
            <label>Name</label>                
             <p class="msg">
                    <?php 
                        if ($_SESSION['messageName']){
                            echo '<p class="msg">'. $_SESSION['messageName'].'</p>';
                        }
                    unset($_SESSION['messageName']);
                     ?> 
                </p>
            <input type="text" name="name" placeholder="Введите свое полное имя">  <br/>
            <label>Login</label>
            <p class="msg">
                    <?php 
                        if ($_SESSION['messageLogin']){
                            echo '<p class="msg">'. $_SESSION['messageLogin'].'</p>';
                        }
                    unset($_SESSION['messageLogin']);
                     ?> 
                </p>
            <input type="text" name="login" placeholder="Введите свой логин"> <br/>
            <label>Password</label>
                         <p class="msg">
                    <?php 
                        if ($_SESSION['messagePassword']){
                            echo '<p class="msg">'. $_SESSION['messagePassword'].'</p>';
                        }
                    unset($_SESSION['messagePassword']);
                     ?> 
                </p>
            <input type="password" name="password" placeholder="Введите свой пароль"> <br/>
            <label>Confirm Password</label>
             <p class="msg">
                    <?php 
                        if ($_SESSION['messagePasswordConfirm']){
                            echo '<p class="msg">'. $_SESSION['messagePasswordConfirm'].'</p>';
                        }
                    unset($_SESSION['messagePasswordConfirm']);
                     ?> 
                </p>
            <input type="password" name="passwordConfirm" placeholder="Подтвердите свой пароль"> <br/>
            <label>Email</label>
                         <p class="msg">
                    <?php 
                        if ($_SESSION['messageEmail']){
                            echo '<p class="msg">'. $_SESSION['messageEmail'].'</p>';
                        }
                    unset($_SESSION['messageEmail']);
                     ?> 
                </p>
            <input type="email" name="email" placeholder="Введите свою электронную почту"> <br/>
            <button type="submit" name="do_register" class="register-btn">Зарегистрироваться</button>
                <p>
                    Если у вас есть аккаунт, пожалуйста <a href="/login.php">авторизируйтесь</a>!
                </p>
                <p class="msg">
                    <?php 
                        if ($_SESSION['message']){
                            echo '<p class="msg">'. $_SESSION['message'].'</p>';
                        }
                    unset($_SESSION['message']);
                     ?> 
                </p>
        </form>
    </body>
</html>

