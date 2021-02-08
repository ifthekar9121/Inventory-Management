<?php include_once("connection.php"); ?>
<?php
	session_start();
	if (isset($_SESSION['user_id'])) {
      header('Location: sign_up_log_in.php');
      exit;
  	}
?>

<?php
$u_id="";
if(isset($_POST['submit'])){

		if (empty($_POST['name']) || empty($_POST['password']) || empty($_POST['phone']) || empty($_POST['mail']) || empty($_POST['address'])){

			echo "<script type='text/javascript'>alert('Field Is Empty!')</script>";
		}
                else{
                    
                    $mail = $_POST['mail'];
			

			if (!filter_var($mail, FILTER_VALIDATE_EMAIL))
                                {
									echo "<script type='text/javascript'>alert('Invalid email format!')</script>"; 
                                }
                        else{            
						$name = $_POST['name'];
                        $password=MD5($_POST['password']);
                        $phone = $_POST['phone'];
						$address = $_POST['address'];
                        $sex = $_POST['gender'];
			

			$sql = "INSERT INTO users (name, password, phone, email, address,sex)
				VALUES ('".$name."','".$password."','".$phone."','".$mail."','".$address."','".$sex."')";

				if (mysqli_query($conn, $sql)) {
				    echo "<script type='text/javascript'>alert('Welcome! Register Successfully')</script>";
				} else {
				    echo "<script type='text/javascript'>alert('Failed!')</script>";
				}
                        }
		}
	}
?>
<?php 
    if(isset($_POST['submit1'])){

		if (empty($_POST['mail']) || empty($_POST['password1'])){

			echo "<script type='text/javascript'>alert('Field Is Empty!')</script>";
		}
        else
        {   
			$user_mail=$_POST['mail'];
            $password =md5($_POST['password1']);

      		$sql = " SELECT COUNT(*) FROM users WHERE( email='".$user_mail."' AND password='".$password."') ";

			$qury = mysqli_query($conn, $sql);

			$result = mysqli_fetch_array($qury);
			
			if($result[0]>0)
            {
				$_SESSION['user_id'] = $user_mail;
				
				
			
			
				header('location: index.php');
				exit;				
            }
            else
            {
				echo "<script type='text/javascript'>alert('Invalid User Name or Password!')</script>";
            }
        }
    }
     			
?>

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="styles/w3.css">
        <title>Inventory Management</title>
    </head>
    <style> 
        .img {
    background-image:url('./image/paper2.jpg');
    background-size: 100% 500px;
    background-repeat: no-repeat;
}
        .mar
        {
                margin-left: 45%;
        }
     </style>
     <body class="img">
        <ul class="w3-navbar w3-black">
		<li style ="margin:0px 20px"><h1>Inventory Management</h1></li>
		<div class="w3-right">
        <li><a href="index.php">Home</a></li>
            
        </li>
            
        
        <li class="active"><a  class="w3-text-red" href="#">Sign Up/Log In</a></li>
		</div>
		
    </ul>
         
         
         <div class = "w3-bottombar">
            <div class="w3-card-4 w3-half">
              <div class="w3-container w3-teal">
                <h2>Open Free Account </h2>
              </div>
                <form class="w3-container" action="" method="post">
                        <p>     
                        <label class="w3-label"><b>User Name</b></label>
                        <input class="w3-input w3-border w3-sand" name="name" type="text" required></p>

                        <p>    
                        <label class="w3-label"><b>Password</b></label>
                        <input class="w3-input w3-border w3-sand" name="password" type="password" required></p>
                        <p>      
                        <label class="w3-label"><b>Phone Number</b></label>
                        <input class="w3-input w3-border w3-sand" name="phone" type="tel" required=""></p>
                        <p>     
                        <label class="w3-label"><b>E-Mail</b></label>
                        <input class="w3-input w3-border w3-sand" name="mail" type="text" required=""></p>
                        <p>    
                        <label class="w3-label"><b>Address</b></label>
                        <input class="w3-input w3-border w3-sand" name="address" type="text" required></p>
                        
                        <p>
                       <input class="w3-radio" type="radio" name="gender" value="male" checked>
                           <label class="w3-validate w3-text-red">Male</label></p>
                         <p>
                            <input class="w3-radio" type="radio" name="gender" value="female">
                           <label class="w3-validate w3-text-blue">Female</label></p>


                         <div class="w3-half"> 
                             <input type="submit" class="w3-btn w3-btn-block w3-green" name="submit" value="Register">

                        </div>
                         
              </form>
            </div>
            
         
            <form class="w3-container w3-card-4 w3-half" action="" method="post">
                <img src="./image/avatar.png" width="15%">
                <p>      
                <label class="w3-text-blue" ><b>E-Mail</b></label>
                <input class="w3-input w3-border" name="mail" type="text" required></p>
                <p>      
                <label class="w3-text-blue"><b>Password</b></label>
                <input class="w3-input w3-border" name="password1" type="password" required></p>
                
                   
                
                <p style="margin-left:45%">      
                    <input type="submit" class="w3-btn w3-round-xxlarge w3-ripple w3-blue" name="submit1" value="Sign In"></p>
        </form> 
        
        <?php
         mysqli_close($conn);
        ?>    
       
    </div>    
         
    </body>
    
</html>
