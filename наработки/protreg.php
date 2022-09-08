<?php 
        $users = file_get_contents("protjson.json");
$json_dec = json_decode($users, true);

$name = $_POST['name'];
$login = $_POST['login'];
$email = $_POST['email'];
$password = $_POST['password'];
$passwordConfirm = $_POST['passwordConfirm'];
$json = file_get_contents('protjson.json');    
$array = json_decode($json,TRUE);                           
unset($json);                            
$array[] = array('name'=>$name, 'login'=>$login, 'email'=>$email, 'password'=>$password);        
file_put_contents('protjson.json',json_encode($array));  
unset($array);    


?>