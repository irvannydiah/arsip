<?php
session_start();

function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

function redirectTo($location) {
    header("Location: $location");
    exit();
}
?>
