<?php
session_start();
//unset($_SESSION['usuario']);
//unset($_SESSION['userID']);
session_destroy();
header("Location: ../login.php");
//echo "<script>alert('".$_SESSION['usuario']."-".$_SESSION['userID']."');</script>";



?>