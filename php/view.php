<?php
   include('connection.php');
   if (isset($_POST['viewid']))
    {
       $id = $_POST['viewid'];    
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

        
		<tr>
			<td>First name</td>
			<td><input type="text" placeholder="Enter firstname" name="firstnameview" id="firstname" value="<?php echo $firstname?>">
				</td>
		</tr>
		<tr>
			<td>Last name</td>
			<td><input type="text" placeholder="Enter lastname" name="lastnameview" id="lastname" value="<?php echo $lastname?>">
			 </td>
		</tr>
		<tr>
			<td>Email</td>
			    <td>
			    	<input type="text" placeholder="Enter email" name="emailview" id="view" value="<?php echo $email?>">
				</td>
		</tr>
		<tr>
			<td>Mobile number</td>
			<td><input type="text" placeholder="mobilenumber" name="mobilenumberview" id="mobilenumber" value="<?php echo $mobilenumber?>">
				</td>
		</tr>
		
		<tr>
			<td>
				<input type="submit" value="submit" name="submitview"></td>
        </tr>
        <tr>
        	<td>
        	<button type="back" value="back" name="back">back</button>
            </td>
        </tr>
    </table>  
</form>
</body>
</html>