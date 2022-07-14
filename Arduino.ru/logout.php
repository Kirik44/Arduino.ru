<?php
header('Location: index.php');
require "db.php";
unset($_SESSION['logged_user']);
?>