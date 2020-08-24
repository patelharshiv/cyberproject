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
    }	
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
    
</head>
<body>
	
<form method="post" name="registraion" action="list_view_javascript.php">
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
				<input type="submit" value="submit" name="submitedit"  onclick="return loadfun();"></td>
        </tr> 
    </table>  
</form>
<div id="success"></div>
 <br />
      
</body>
</html>
<script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
<script type="text/javascript">
   function loadfun()
{   
   $.ajax({
            type:"POST",
            url:"edit_javascript.php",
            data:$('#formbox').serialize(),
            success:function(response)
            {
                $('success').html(response);
            }
        });
      return false;
}      
</script>
