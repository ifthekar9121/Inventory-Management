<?php include_once("connection.php")?>
<?php
session_start(); 
if (!isset($_SESSION['user_id'])) 
    {
      header('Location: sign_up_log_in.php');
      exit;
	}
$add = 1;

$str1 = $_SESSION['user_id'];
$sql="SELECT * FROM `order` WHERE user_id='".$str1."'";
$result=$conn->query($sql);
$sql1 = " SELECT id FROM `cart` WHERE user_id='".$str1."'";
$count=$conn->query($sql1);
$sql2 = "SELECT name FROM `users` WHERE email='".$str1."'";
$name=$conn->query($sql2);
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
	#btn{
		padding-left: 600px;
		padding-bottom: 60px;
		
	}
    </style>
    <body>
        <ul class="w3-navbar w3-black">
			<li style ="margin:0px 20px"><h1>Inventory Management</h1></li>
			<div class="w3-right">
			<li><a  href="index.php">Home</a></li>
			<li><a class="" href="#">Cart<i class="fa fa-caret-down"></i></a></li>
			<li><a href="logout.php">Log out</a></li>
			</div>
		
		</ul>
		<div>
			<h3></h3>
		</div>
        
        <div id="top">
            <div>
                <h1 class="w3-animate-left w3-xxxlarge w3-center font w3-display-topmiddle"> Order Is Successful </h1>
            </div>   
        </div>
		<div>
		<?php
			$row1 = $name->fetch_assoc();
			echo '<h1 class="w3-animate-left w3-xxxlarge w3-center font w3-display-topmiddle"> '.$row1["name"].'</h1>';
			?>
		</div>
		<?php
				$i=0;
				$row = $result->fetch_assoc();
				$g_price = 0;
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
						</tr>';
						$g_price += $row["price"];
					}
					$row = $result->fetch_assoc();
				}
				if($i == 0) {
						$add = 0;
						echo '<h5 style="text-align: center;">No previous cart</h5>';
					}
				echo '<tr>
					<td class="td" colspan="3">Grand Tottal</td>
					<td class="td"> = '.$g_price.'</td>
				</tr>';
			echo '</table>';
			mysqli_close($conn);
        ?>      
    </body>
	   
</html>

