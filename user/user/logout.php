<?php
session_start();
session_unset($_SESSION['profile']);
session_unset($_SESSION['user']);
header("LOCATION: index.php");
?>