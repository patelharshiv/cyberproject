<?php
    include('connection.php');
    session_start();
    $id = $_SESSION['id'];
    echo $id;    
    
  $query = "SELECT * from registration WHERE id = '$id'";
	$result = mysqli_query($conn, $query) or die( mysqli_error($conn));
	if ($result->num_rows > 0) 
	{
	
	    while($row = $result->fetch_assoc()) 
		{
		
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
               background-image: url("img/k2.jpg");
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
    
        #container{
            margin-left: 30%;
            margin-right: 30%;
            margin-top: 15%;
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
        #btn,#submitedit{
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
	
<form method="post" name="registraion" action="edit.php">
    <input type="hidden" name="editid" value="<?php echo $id; ?>">    
		<div id="container">
    <div class="form-group"> 
			<label>First name</label>
			<input type="text" placeholder="Enter firstname" name="firstnameedit" id="firstname" value="<?php echo $row['firstname']; ?>">
		</div>
      <div class="form-group">
			<label>Last name</label>
			<input type="text" placeholder="Enter lastname" name="lastnameedit" id="lastname" value="<?php echo $row['lastname']; ?>">
		</div>
		<div class="form-group">
			<label>Email</label>
				<input type="text" placeholder="Enter email" name="emailedit" id="email" value="<?php echo $row['email']; ?>">
		</div>
    <div class="form-group">
			<label>Mobile number</label>
			<input type="text" placeholder="mobilenumber" name="mobilenumberedit" id="mobilenumber" value="<?php echo $row['mobilenumber']; ?>">
		</div>
    <input type="hidden" name="password" value="<?php echo $password; ?>" id="password">
	
			<div>
				<button type="submit" value="submit" name="submitedit" id="submitedit">submit</button>
      </div>
</div>    
</form>
</body>
</html>
<?php
}
}
if(isset($_POST['submitedit']))
{
   $editid = $_POST['editid'];
   $firstnameedit = $_POST['firstnameedit'];
   $lastnameedit = $_POST['lastnameedit'];
   $emailedit = $_POST['emailedit'];
   $mobilenumberedit = $_POST['mobilenumberedit'];
   $password = $_POST['password'];
   $editsubmitquery = "UPDATE registration SET firstname='$firstnameedit', lastname='$lastnameedit', email = '$emailedit', mobilenumber = '$mobilenumberedit' WHERE id='$editid'"; 
    if(!mysqli_query($conn,$editsubmitquery))
   {
      echo("Error description: " . mysqli_error($conn));
      echo $editid;
      echo $firstnameedit;
      echo $lastnameedit;
      echo $emailedit;
      echo $mobilenumberedit;
   }
} 
?>
