<?php
session_start();
if(isset($_SESSION['user_authorized'])) session_destroy();
header("Location: ../index.php");
?>