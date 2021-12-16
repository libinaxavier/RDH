<?php
include("../connection.php");
include("table.php");

mysqli_query($con,"update registartion set status='$_REQUEST[st]' where id='$_REQUEST[id]'") or die("error".mysqli_error($con));



header("location:select.php");
?>
