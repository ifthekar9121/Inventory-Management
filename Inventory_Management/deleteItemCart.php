<?php
 include_once("connection.php");
$cartId = $_GET['cartId'];
$sql="DELETE FROM `cart` WHERE id='$cartId'";
$result=$conn->query($sql);
header('Location: cart.php');
?>