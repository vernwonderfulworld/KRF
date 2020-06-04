<?php

$conn = new mysqli('localhost', 'root', '', 'krs');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

?>