<?php
session_start();
unset($_SESSION["usr_id"]);
unset($_SESSION["usr_name"]);
header("Location:signin.php");
?>