<?php

$conn= new mysqli("localhost:3306","root","root","eCommerce");

if($conn->connect_error){
    die("Connection failed: ".$conn->connect_error);
}

echo "Connected successfully";



?>