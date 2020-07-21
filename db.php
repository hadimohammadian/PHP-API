<?php

$localhost = 'localhost';
$username = 'root';
$password = '';
$db = 'api';

$connect = mysqli_connect($localhost,$username,$password,$db);
if ($connect){
    echo 'Connected'."<br>";
}
else{
    echo 'Disconneced'."<br>";
    die();
}
