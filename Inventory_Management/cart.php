<?php include_once("connection.php")?>
<?php
session_start(); 
if (!isset($_SESSION['user_id'])) 
    {
      header('Location: sign_up_log_in.php');
      exit;
  	}
$str1 = $_SESSION['user_id'];
$sql="SELECT * FROM `cart` WHERE user_id='".$str1."'";
$result=$conn->query($sql);
$sql1 = " SELECT id FROM `cart` WHERE user_id='".$str1."'";
$count=$conn->query($sql1);
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="styles/w3.css">
        <title>Inventory Management</title>
    </head>
    <style> 
	#top{
		margin: 20px;
		padding: 20px;
	}
	.cart_table{
		width: 100%;
		margin: 50px; 
	}
	.td{
		padding: 20px;
	}
	.button {
		background-color: #008CBA;
		border: none;
		color: white;
		padding: 15px 32px;
		text-align: center;
		text-decoration: none;
		display: inline-block;
		font-size: 16px;
		margin: 4px 2px;
		cursor: pointer;
	}
	.text-center {
		text-align: center;
	}
    </style>
    <body>
        <ul class="w3-navbar w3-black">
			<li style ="margin:0px 20px"><h1>Inventory Management</h1></li>
			<div class="w3-right">
			<li><a  href="index.php">Home</a></li>
			<li class="active"><a class="w3-text-red" href="#">Cart<i class="fa fa-caret-down"></i></a></li>
			<li><a href="logout.php">Log out</a></li>
			</div>
		
		</ul>
		<div>
			<h3></h3>
		</div>
        
        <div id="top">
            <div>
                <h1 class="w3-animate-left w3-xxxlarge w3-center font w3-display-topmiddle"> Cart</h1>
            </div>   
        </div>
		<?php
				$i=0;
				$row = $result->fetch_assoc();
				while($row !== null ){ 
					$i=$i+1; 
					if($i == 1) {
						echo '<table border= 2px; class = "cart_table">
				<tr>
					<td class="td">No</td>
					<td class="td">Product Name</td>
					<td class="td">Quantity</td>
					<td class="td">Price</td>
					
				</tr>';
					}
					if($i != 0) {
						echo '<tr>
							<td class="td">' . $i. '</td>
							<td class="td"> '.$row["product_name"].'</td>
							<td class="td">'.$row["quantity"].'</td>
							<td class="td"> '.$row["price"].' Taka</td>
							<td><a href="deleteItemCart.php?cartId='.$row["id"].'">delete</a></td>
						</tr>';
					}
					$row = $result->fetch_assoc();
				}
				if($i === 0) {
						echo '<h5 style="text-align: center;">No previous cart</h5>';
					}
			echo '</table>';
			if($i > 0) {
				echo '<div class="text-center"><a class="button" href="placeOrder.php">Order Now</a></div>';
			}
		mysqli_close($conn);
        ?>      
    </body>
	   
</html>

