<?php
session_start();
session_destroy();

header('Location: Cms/login.php');
?>