<?php

$servername = '127.0.0.1';
$username = 'root';
$password = '';
$dbname = "library";

// create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// check status
if ($conn->connect_error) {
    exit('Failed: ' . $conn->connect_error);
}
echo '<script> console.log("Successful connect to DB")</script>';

function alert($str, $url)
{
    echo '<script> alert ("' . $str . '");location.href="' . $url . '";</script>';
}



session_start();
