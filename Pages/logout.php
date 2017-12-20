<?php
session_start();
session_destroy();

header('Location: loginExample/login.php');
?>