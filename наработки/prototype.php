<?php
$name = $_POST['name'];
$login = $_POST['login'];
$email = $_POST['email'];
$password = $_POST['password'];
$passwordConfirm = $_POST['passwordConfirm'];
$json = file_get_contents('datebase.json');    
$array = json_decode($json,TRUE);     



print_r($array[1]['name']);

?>