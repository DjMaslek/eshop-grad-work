<?php
require "includes/config.php";

unset($_SESSION['logged_user']);
header('Location: /');
?>