<?php include_once("connection.php");?>
<?php
session_start();

$sql="SELECT * FROM `product` WHERE quantity > 0";
$result=$conn->query($sql);

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
    #prdct{
		width: 100%;
		margin: 20px;
	}
	#des{
		margin: 10px;
	}

    </style>
    <body>
        <ul class="w3-navbar w3-black">
		<li style ="margin:0px 20px"><h1>Inventory Management</h1></li>
		<div class="w3-right">
        <li class="active">
		<a class="w3-text-red" href="#">Home</a></li>
		<?php 
		if (isset($_SESSION['user_id'])) {
		?>
		<li><a href="cart.php">Cart<i class="fa fa-caret-down"></i></a>
         <?php 
		 }
		else{
		?>
		<li><a href="sign_up_log_in.php">Cart<i class="fa fa-caret-down"></i></a> <?php } ?>	
        </li>
            
        <?php if (isset($_SESSION['user_id'])) {?>
			<li><a href="logout.php">Log out</a></li>
		<?php 
		}
		else{
			
		?>
			<li><a href="sign_up_log_in.php">Sign Up/Log In</a></li> <?php } ?>
		</div>
		
    </ul>
        
        <div id="top">
            <div>
                <h1 class="w3-animate-left w3-xxxlarge w3-center font w3-display-topmiddle"> Products</h1>
            </div>   
        </div>
		<div id="prdct">
		<?php while($row = $result->fetch_assoc() ){?>		
		<div style="border-bottom: 2px #aaa solid;">
			
			
			<div style="text-align: center;">
				<img src="products/<?=$row["thumbnail"]?>" alt="<?=$row["name"]?>" width="600px" height="400px">
				
			</div>
			<div id ="des" style="width:100%">
				<h2><?=$row["name"]?></h2>
				<h4>Description : </h4>
				<p><?=$row["description"]?></p>
				<p>Price: <?=$row["price"]?> Taka</p>
				<p>In Stock: <?=$row["quantity"]?></p>
				<form class="" action="" method="post">
					<label class="w3-label"><b>Quantity</b></label>
					<input type="hidden" name="p_id" value = "<?=$row["id"]?> ">
					<input type="hidden" name="p_name" value = "<?=$row["name"]?> ">
					<input type="hidden" name="p_price" value = "<?=$row["price"]?> ">
					<input type="hidden" name="p_quan" value = "<?=$row["quantity"]?> ">
					<input type="number" name="quantity">
					
					<input type="submit" class="w3-btn w3-round-xxlarge w3-ripple w3-blue" name="addCart1" value="Add To Cart"></p>
				</form>
			</div>
		</div>
		<?php }	?>
		</div>
		
	<?php
	if(isset($_POST['addCart1'])){
		if (isset($_SESSION['user_id'])) 
		{
			if (empty($_POST['quantity'])){

				echo "<script type='text/javascript'>alert('Quantity Is Empty!')</script>";
			}
			else{
				$quantity = $_POST['quantity'];
				$s_quantity = $_POST['p_quan'];
				if($quantity > 0){
					if((int)$quantity > (int)$s_quantity){
						echo "<script type='text/javascript'>alert('Our Stock Is Less Than Your Desire Quantity!')</script>";
					}
					else{
						$str1 = $_SESSION['user_id'];
						$product_id =$_POST["p_id"];
						$name = $_POST["p_name"];
						$price =$_POST["p_price"]; 
						$price1 = $_POST["p_price"] * $_POST['quantity'];
						$sql = "INSERT INTO cart (user_id, product_id, product_name, quantity, price) VALUES ('".$str1."','".$product_id."','".$name."','".$quantity."','".$price1."')";
						if (mysqli_query($conn, $sql)) {
							echo "<script type='text/javascript'>alert('Added Successfully');</script>";
						} 
						else {
							echo "<script type='text/javascript'>alert('Failed!');</script>";
						}
					}
				}
				else
				{
					echo "<script type='text/javascript'>alert('Please Input A Positive Number');</script>";
				}
			}
			
			
		}
		
		
		else{
			
			echo "<script type='text/javascript'>alert('Please Log In first');</script>";
			exit;
		}
	}

    mysqli_close($conn);
?>      
        
    </body>
    
</html>
