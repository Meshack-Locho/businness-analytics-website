<?php

$conn = new mysqli("localhost", "root", "", "design1_users");

if ($conn->connect_error) {
    die("Something went wrong");
}

?>