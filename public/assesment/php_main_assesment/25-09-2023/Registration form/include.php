<?php

$servername='192.168.7.254';
$user_name='bharath_juntrdev_usr';
$password='h3ZiK6LYJUThoMnA';
$database='bharath_juntrdev_db';
$port_no='42209';



$con=new mysqli($servername,$user_name,$password,$database,$port_no);

if(!$con){
    die("connection".$con->error);
}

?>