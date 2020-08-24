<?php
    include('connection.php');
?>
<?php    
    if (isset($_POST['editid']))
    {
       $id = $_POST['editid'];    
       $fetchquery = "SELECT * FROM registration WHERE id = '$id'";
       $resultfetch = mysqli_query($conn, $fetchquery);
       $row = mysqli_fetch_array($resultfetch);
       $firstname = $row['firstname'];
       $lastname = $row['lastname'];
       $email = $row['email'];
       $mobilenumber = $row['mobilenumber'];
       $firstname;
       $lastname;
       $email;
       $mobilenumber;
    

    $Firstnameerr = $Lastnameerr = $Emailerr = $Mobilenumbererr = $Passworderr = "";
    $firstname = $lastname = $email = $mobilenumber = $password = "";
    if(isset($_POST['submit'])=='submit')
    {
    
	    if (empty($_POST['firstname']))
	    {
	   	  $Firstnameerr="Firstname is requierd";
	    } 
	    else
	    {
	        $firstname = $_POST['firstname'];      
	   		//echo $firstname;
	    }
	    
	    if (empty($_POST['lastname']))
	    {
	   	  $Lastnameerr="lastname is requierd";
	    } 
	    else
	    {
	        $lastname = $_POST['lastname'];
	        //echo $lastname;      
	    }

	    if (empty($_POST['email']))
	    {
	   	  $Emailerr="email is requierd";
	    } 
	    else
	    {
	        $email = $_POST['email']; 
	       // echo $email;     
	    }
	    
	    if (empty($_POST['mobilenumber']))
	    {
	   	  $Mobilenumbererr="mobilenumber is requierd";
	    } 
	    else
	    {
	        $mobilenumber = $_POST['mobilenumber']; 
	        //echo $mobilenumber;     
	    }
	    
	    if (empty($_POST['password']))
	    {
	   	  $Passworderr="password is requierd";
	    } 
	    else 
	    {
	        $password = $_POST['password'];
	        //echo $password;   
	    }

	    $Firstname = $_POST['firstname'];
	    $Lastname = $_POST['lastname'];
	    $Email = $_POST['email'];
	    $Mobilenumber = $_POST['mobilenumber'];
	    $Password = $_POST['password'];


		//$Firstnameerr = $Lastnameerr = $Emailerr = $Mobilenumbererr = $Passworderr = "";
	    if( $Firstnameerr != '' || $Lastnameerr != '' || $Emailerr !='' || $Mobilenumbererr !='' || $Passworderr !='')
	    {
	    	echo "check error";
	    }
	    else
	    {

	    	$sql = "select email from registration where email='$Email'";
	    	$sqlexe = mysqli_query($conn, $sql);

	    	if ($sqlexe ->num_rows > 0) 
	    	{

	    		echo "Email already exiest";
	    	}
	    	else
	    	{
			    $insert = "INSERT INTO registration (firstname, lastname, email, mobilenumber, password ) VALUES ('$Firstname','$Lastname','$Email','$Mobilenumber','$Password')";
			    $insertexe = mysqli_query($conn, $insert);
			    if ($insertexe)
			    {
			    	echo "Insert Data";
			    }
			    else	
			    {
			    	echo "Not inserted Data";
			    }
	    	}
	    }
    }
    }	
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
    
</head>
<body>
	
<form method="post" name="registraion" action="list_view.php">
 	<table border="0" align="center">
    <input type="hidden" name="editid" value="<?php echo $id?>">    
		<tr>
			<td>First name</td>
			<td><input type="text" placeholder="Enter firstname" name="firstnameedit" id="firstname" value="<?php echo $firstname?>">
				</td>
		</tr>
		<tr>
			<td>Last name</td>
			<td><input type="text" placeholder="Enter lastname" name="lastnameedit" id="lastname" value="<?php echo $lastname?>">
			 </td>
		</tr>
		<tr>
			<td>Email</td>
			<td>
				<input type="text" placeholder="Enter email" name="emailedit" id="email" value="<?php echo $email?>">
			</td>
		</tr>
		<tr>
			<td>Mobile number</td>
			<td><input type="text" placeholder="mobilenumber" name="mobilenumberedit" id="mobilenumber" value="<?php echo $mobilenumber?>">
				</td>
		</tr>
		
		<tr>
			<td>
				<input type="submit" value="submit" name="submitedit"></td>
        </tr>
    </table>  
</form>
</body>
</html>
