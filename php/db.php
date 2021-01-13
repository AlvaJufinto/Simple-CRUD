<?php 

function Createdb() {
    $servername ='localhost';
    $username = 'root';
    $password = '';
    $dbname = 'bookstore';

    // Create connection
    $conn = mysqli_connect($servername, $username, $password);

    // Check connection 
    if(!$conn) {
        die("Connection Failed :".mysqli_connect_error());
    }

    // Create Database
    $sql = "CREATE DATABASE IF NOT EXISTS $dbname";

    if(mysqli_query($conn, $sql)) {
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        $sql = "
            CREATE TABLE IF NOT EXISTS books(
                id INT(255) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                book_writer VARCHAR(300) NOT NULL,
                book_name VARCHAR (300) NOT NULL,
                book_publisher VARCHAR (300),
                book_price FLOAT
            )
        ";

    if(mysqli_query($conn, $sql)) {
        return $conn;
    } else {
        echo "Cannot Create table...!";
    }

    } else {
        echo "Error while creating database".mysqli_error($conn);
    }

}