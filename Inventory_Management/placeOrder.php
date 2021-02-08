<?php
    include_once("connection.php");
    session_start(); 
    if (!isset($_SESSION['user_id'])) 
        {
        header('Location: sign_up_log_in.php');
        exit;
        }
    $str1 = $_SESSION['user_id'];
    $sql12 = "DELETE FROM `order` where user_id = '".$str1."'";
    $del=$conn->query($sql12);
    $sql="SELECT * FROM `cart` WHERE user_id='".$str1."'";
    $result=$conn->query($sql);
    while($row = $result->fetch_assoc()){
        $sql1 = "INSERT INTO `order`(`user_id`, `product_id`, product_name, `quantity`, `price`) VALUES ('".$str1."','".$row['product_id']."','".$row['product_name']."','".$row['quantity']."','".$row['price']."')";
        $quan1 = $row['quantity'];
        mysqli_query($conn, $sql1);

        $sql="DELETE FROM `cart` WHERE id='".$row['id']."'";
        $res=$conn->query($sql);

        $sql2 = "SELECT * FROM `product` WHERE id = '".$row['product_id']."'";
        $res1=$conn->query($sql2);
        
        $qrow = $res1->fetch_assoc();
        // var_dump($qrow);
        $quan = (int)$qrow['quantity'] - (int)$quan1;

        $sql3 = "UPDATE `product` SET `quantity` ='".$quan."' WHERE id = '".$qrow['id']."'";
        $res2=$conn->query($sql3);
    }
    mysqli_close($conn);

    header('Location: order.php');

?>