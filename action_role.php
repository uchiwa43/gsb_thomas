<?php
session_start();

$_SESSION['role']=$_POST['Role'];

header("location:index.php")
?>