<?php
$domain = 'http://localhost/Four-Arms-Tech-Comunity';

$host = "localhost";
$user = "root";
$pass = "";
$bd = "four_arms_tech_community";
$conn = mysqli_connect($host, $user, $pass, $bd);

if (!$conn) {
    echo 'DB is not connected!';
}