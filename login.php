<?php
    include ('connection.php');
    session_start();
?>
<?php
if(isset($_POST['login']))
{
	$email=$_POST['email'];
	$password = $_POST['password'];
    $query = "SELECT * from registration WHERE email = '$email' AND password = '$password'";
	$result1 = mysqli_query($conn, $query);

	if($result1->num_rows > 0) 
	{
 	    $row = $result1->fetch_assoc(); 
 	    $id = $row['id'];
		$query4 = "SELECT * FROM images WHERE uid='$id'";
		$result4 = mysqli_query($conn,$query4) or die(mysqli_error($conn));
		if(mysqli_num_rows($result4) > 0){
				$row4 = mysqli_fetch_array($result4);
				$img_dir = $row4['img_dir'];
				$_SESSION['img_dir'] = $img_dir;
		}else{
				$img_dir = "img/pp1.png";
				$_SESSION['img_dir'] = $img_dir;
			}
 	    $firstname = $row['firstname'];
 	    $lastname = $row['lastname'];
 	    $_SESSION['id'] = $id;
 	    $_SESSION['firstname'] = $firstname;
		$_SESSION['lastname'] = $lastname; 	    
 	    echo "login success";
 	    header('location:final.php');	    	
    }
    else
    {
    	echo "login erroe";
    }	
}
        
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		*{
			margin: 0;
			padding: 0;
		}
		#container{
			display: grid;
			grid-template-columns: 50% 50%;
			margin-left: 10%;
			margin-right:10%;
			margin-top: 5%;
				}
		.form-group{
			margin-top: 2%;
		}
		input{
			height: 30px;
			border-radius: 15px;
			width: 50%;
			padding-left: 10px;
			border-width: 1px;
			margin-top: 1%;
			
		}
		input:focus{
			height: 30px;
			border-radius: 15px;
			width: 50%;
			padding-left: 10px;
			margin-top: 1%;
			border-color: #FF3352;
			border-width: 2px;
			outline: none;
			box-shadow: 2px 2px 2px 2px red;

		}
		#btn{
			margin-top: 3%;
			height: 30px;
			width: 50%;
			background-color: #FF3352;
			border-radius: 8px;
			font-size: 15px;
			border-color: none;
			border-width: 0px;
			font-family: "Times New Roman", Times, serif;
		}

	</style>
</head>
<body>
	<form method="post" name="registraion" action="login.php">
		<div id="container">
			<div id="image">
				<img src="img/k5.png" style="width: 80%;
			height:350px;">
			</div>
			<div id="form1">
				<center>
 	    <div class="form-group">

			<label>Email</label></br>
			<input type="text" placeholder="Enter email" name="email" id="email">
			<div id="emailerror"></div>
	    </div>
	    <div class="form-group">
			<label>Password</label></br>
			<input type="text" placeholder="Enter password" name="password" id="password">
			<div id="pwderror"></div>
		</div>
			<div>
				<button type="login" name="login" id="btn">LOGIN</button> 
            </div>
        </div>
        </center>
        
</div>
</form> 

</body>
</html>