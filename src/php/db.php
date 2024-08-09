<?php

//created separate db file to avoid redundancy
$connect = mysqli_connect(
    'db', // service name
    'user', // username
    'password', // password
    'php_docker' // db table
);

//check the db connection
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}

