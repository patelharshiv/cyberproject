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
               background-image: url("img/k4.jpg");
               background-repeat: no-repeat;
               background-size: cover; 
               width: 100%;
               height: 100%;
            }
            #image
            {
            margin: 50;
            padding: 50;
            position: relative;

            }
        #container{
            margin-left: 60%;
            margin-right:0%;
            margin-top: 2%;
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
    <form method="post" name="registraion" action="registration.php">
        <div id="container">
    <div class="form-group">
            <label>First name</label></br>
            <input type="text" placeholder="Enter firstname" name="firstname" id="firstname">
                <span><?php echo $Firstnameerr?></span>
        </div>
            <div class="form-group">
            <label>Last name</label></br>
            <input type="text" placeholder="Enter lastname" name="lastname" id="lastname">
             <span><?php echo $Lastnameerr?></span>
        </div>
        <div class="form-group">
            <label>Email</label></br>
            <input type="text" placeholder="email" name="email" id="email">
                <span><?php echo $Emailerr?></span>
        </div>
        <div class="form-group">
            <label>Mobile number</label></br>
            <input type="text" placeholder="mobilenumber" name="mobilenumber" id="mobilenumber">
                <span><?php echo $Mobilenumbererr?></span>
        </div>
        <div class="form-group">
            <label>Password</label></br>
            <input type="password" placeholder="Enter password" name="password" id="password">
                <span><?php echo $Passworderr?></span>
        </div>
        <div>
            <button type="submit" value="submit" name="submit" id="btn">submit</button>
        </div>
  </div>
</form>
</body>
</html>
