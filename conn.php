<?php


$servername="localhost:3307";
$username="root";
$password="";
$database="ecommerce";

// create connection

$conn= mysqli_connect($servername,$username,$password,$database);

if(!$conn){
    die("Sorry We faield to connect". mysqli_connect_error());
}
// else{
// // echo "conn
// echo "Connection successfull";

// }

?>