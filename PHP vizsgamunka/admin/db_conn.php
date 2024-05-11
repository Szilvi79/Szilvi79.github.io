<?php

$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "akciowebshop_p"; 

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Kapcsolódási hiba: " . $conn->connect_error);
}