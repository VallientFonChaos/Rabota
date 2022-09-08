<?php
   session_start();
   
$name = $_POST['name'];
$login = $_POST['login'];
$email = $_POST['email'];
$password = $_POST['password'];
$passwordConfirm = $_POST['passwordConfirm'];
$json = file_get_contents('datebase.json');    
$array = json_decode($json,TRUE);                                           
$step = array('name'=>$name, 'login'=>$login, 'email'=>$email, 'password'=>$password);  




$num = count($array);
for ($i=0; $i < $num; $i++) { 
    if($array[$i]['login'] === $login) {
             $_SESSION['message'] = 'Такой Логин есть';
    header('Location: ../register.php');
    die('Такой Логин есть');
} }


$num = count($array);
for ($i=0; $i < $num; $i++) { 
    if($array[$i]['email'] === $email) {
             $_SESSION['message'] = 'Такой Email есть';
    header('Location: ../register.php');
    die('Такой Email есть');
} }


if ($name === '') {
    $_SESSION['messageName'] = 'Поле с именем не должно быть пустым';
    header('Location: ../register.php');
    die('Поле с именем не должно быть пустым');
}

if (!preg_match("/^[a-zа-яё][a-zа-яё]*[a-zа-яё]$/i", $name)) {
    $_SESSION['messageName'] = 'Поле с именем должно состоять из латинских букв';
    header('Location: ../register.php');
    die('Поле с именем должно состоять из латинских букв');
}

if (mb_strlen($name) < 2 ) {
    $_SESSION['messageName'] = 'Поле с именем должно иметь не мение 2 букв';
    header('Location: ../register.php');
    die('Поле с именем должно иметь не мение 2 букв');
}

if ($login === '' ) {
    $_SESSION['messageLogin'] = 'Поле с логином не должно быть пустым';
    header('Location: ../register.php');
    die('Поле с логином не должно быть пустым');
} 


if (mb_strlen($login) < 6) {
    $_SESSION['messageLogin'] = 'Поле с логином должно иметь не мение 6 символов';
    header('Location: ../register.php');
    die('Поле с логином должно иметь не мение 6 символов');
} 
    
if ($password === '') {
    $_SESSION['messagePassword'] = 'Поле с паролем не может быть пустым';
    header('Location: ../register.php');
    die('Поле с паролем не может быть пустым');
}

if (!preg_match("/^[a-zа-яё\d][a-zа-яё\d\s]*[a-zа-яё\d]$/i", $password)) {
    $_SESSION['messagePassword'] = 'Поле с паролем должно состоять из латинских букв и цифр';
    header('Location: ../register.php');
    die('Поле с именем должно состоять из латинских букв и цифр');
}

if (mb_strlen($password) < 6) {
    $_SESSION['messagePassword'] = 'Поле с паролем должно иметь не мение 6 символов';
    header('Location: ../register.php');
    die('Поле с паролем должно иметь не мение 6 символов');
} 

if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['messageEmail'] = 'Поле с email не может быть пустым';
    header('Location: ../register.php');
    die('Поле с email не может быть пустым');
}

if ($passwordConfirm === '') {
    $_SESSION['messagePasswordConfirm'] = 'Поле с подтверждением пароля не может быть пустым';
    header('Location: ../register.php');
    die('Поле с подтверждением пароля не может быть пустым');
}

if($password === $passwordConfirm){

} else {
    $_SESSION['message'] = 'Пароли не совпадают';
    header('Location: ../register.php');
    die('Пароли не совпадают');
}

$password= md5($password);


if (in_array($step, $array)) {
     $_SESSION['message'] = 'Такой пользователь есть';
    header('Location: ../register.php');
    die('Такой пользователь есть');
} else {
    $array[] = array('name'=>$name, 'login'=>$login, 'email'=>$email, 'password'=>$password);        
    file_put_contents('datebase.json',json_encode($array)); 
    header('Location: ../login.php');
}

?>
