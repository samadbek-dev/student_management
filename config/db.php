<?php
$host = "localhost";
$dbname = "student_list";
$username = "root";
$password = "";

try{
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
//xatolikni ko'rsatish
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e){
    die("Xatolik: ". $e->getMessage());
}