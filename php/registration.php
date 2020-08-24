<?php
    include ('connection.php');
?>
<?php
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


	//$Firstnameerr = $Lastnameerr = $Em ailerr = $Mobilenumbererr = $Passworderr = "";
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
  body
  {
    background-image: url("img/sun.png.JPG");
    background-repeat: no-repeat;
    background-size: cover; 
    width: 100%;
    height: 100%;
  }
  #image
  {
    margin: 0;
    padding: 0;
    position: relative;
  }
</style>
</head>
<body>

<form method="post" name="registraion" action="registration.php">
 	<table border="0" align="center">
        
		<tr>
			<td>First name</td>
			<td><input type="text" placeholder="Enter firstname" name="firstname" id="firstname">
				<span><?php echo $Firstnameerr?></span></td>
		</tr>
		<tr>
			<td>Last name</td>
			<td><input type="text" placeholder="Enter lastname" name="lastname" id="lastname">
			 <span><?php echo $Lastnameerr?></span></td>
		</tr>
		<tr>
			<td>Email</td>
			<td><input type="text" placeholder="email" name="email" id="email">
				<span><?php echo $Emailerr?></span></td>
		</tr>
		<tr>
			<td>Mobile number</td>
			<td><input type="text" placeholder="mobilenumber" name="mobilenumber" id="mobilenumber">
				<span><?php echo $Mobilenumbererr?></span></td>
		</tr>
		<tr>
			<td>Password</td>
			<td><input type="password" placeholder="Enter password" name="password" id="password">
				<span><?php echo $Passworderr?></span></td>
		</tr>
		<tr>
			<td>
				<input type="submit" value="submit" name="submit"></td>
        </tr>
    </table>  
</form>
</body>
</html>
