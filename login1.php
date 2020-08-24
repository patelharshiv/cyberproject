<?php
    include ('connection.php');
    session_start();
    $id = $_SESSION['id'];
    
    $query = "SELECT * from registration WHERE id = '$id'";
	$result = mysqli_query($conn, $query) or die( mysqli_error($conn));
	if ($result->num_rows > 0) 
	{
	
	    while($row = $result->fetch_assoc()) 
		{
		  $firstname = $row['firstname'];
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
        .miti{
            display: grid;
            grid-template-columns: 50% 50%;
        }
        #container{
            margin-left: 30%;
            margin-right: 30%;
            margin-top: 10%;
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
        #btn,#submit123,#myfile,#backbtn,#timeline,#seefriends{
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
    <div class="miti">
<form method="post" action="login1.php">
        <div id="container">	
        <div class="form-group">
            <label>FirstName:</label></br>
            <input type="text" name="fname1" id="fname"  required="required" value="<?php echo $row['firstname']?>">
        </div>
        <div class="form-group">
            <label>LastName:</label></br>
            <input type="text" name="lname1" id="lname"  value="<?php echo $row['lastname']?>"> 
        </div>
        <div class="form-group">
            <label>E-mail:</label></br>
            <input type="email"  name="email1" id="email"  value="<?php echo $row['email']?>">
        </div>
        <div class="form-group">
            <label>mobilenumber:</label></br>
            <input type="text" name="mobilenumber1" id="mobilenumber"  value="<?php echo $row['mobilenumber']?>">
        </div></br>
</form>
    <form action="login1.php" method="post" enctype="multipart/form-data">
        <label>Select Images</label></br>
        <input type="file" name="myfile" id="myfile">
        <button type="submit" name="submit123" id="submit123">Upload Image</button>
    </form>  

        <div>
            <button type="back" value="back" name="back" id="backbtn">back</button>
            <button type="edit" value="edit" name="edit" id="btn">edit</button>
            <button type="submit" value="timeline" name="timeline" id="timeline">Timeline</button>
            <button type="submit" value="seefriends" name="seefriends" id="seefriends">FRIENDS</button>
        </div>
        <ul class ="nav nav-tabs justify-content-end">
                <li class="nav-item">
                <a class="nav-link active" href="list_view.php">list_view</a>  
        </li>
        </ul>      
</div>
<?php
$select = "SELECT * FROM images WHERE uid = '$id'";
            $selectexe = mysqli_query($conn,$select);
            if (mysqli_num_rows($selectexe) > 0)
            {
                while ($row1 = mysqli_fetch_array($selectexe)){
                ?>
                <img src="<?php echo $row1['img_dir'];  ?>" alt="Timeline Update" style = "max-width: 70%; max-height: 70%"><hr></hr><?php
            }
            }else{
                ?><h1> No Profile Picture Uploaded </h1><?php
            }
?>
</div>
</body>
</html>
<?php
}
}
?>
<?php
if (isset($_POST['edit']))
	{
		header('location:edit.php');
	}
?>	
<?php
if (isset($_POST['timeline']))
    {
        header('location:timeline.php');
    }
?>  
<?php
if (isset($_POST['seefriends']))
    {
        header('location:seefriends.php');
    }
?> 

<?php

if (isset($_POST['submit123'])){ 
    $id = $_SESSION['id'];
    $select1 = "SELECT * FROM images WHERE uid = '$id'";
    $selectexe1 = mysqli_query($conn,$select1);
    if (mysqli_num_rows($selectexe1) > 0)
    {
        if(isset($_FILES['myfile']))
        {
            $files = $_FILES['myfile'];
            $filename = $files['name'];
            $fileerror = $files['error'];
            $filetmp = $files['tmp_name'];
            $filesize = $files['size'];
            $fileext = explode('.', $filename);
            $fileonlyname = $fileext['0'];
            $fileonlyext = $fileext['1'];
            $filecheck = strtolower(end($fileext));
            $allowed = array( 'jpg', 'jpeg', 'gif', 'png', 'bmp');
            if(in_array($filecheck, $allowed))
            {
            $destinationfile = "uploadimages/".$filename;
            move_uploaded_file($filetmp, $destinationfile);
            $errorattachment="false";
            $query2 = "UPDATE images SET img_dir = '$destinationfile' WHERE uid = '$id'"; 
                if(!mysqli_query($conn,$query2))
                {
                    echo "Something went wrong please try again later";
                }
          }
      else
      {
         $errorattachment="Something Went wrong Please try again";
      }
  }
}else{
    if(isset($_FILES['myfile']))
        {
            $files = $_FILES['myfile'];
            $filename = $files['name'];
            $fileerror = $files['error'];
            $filetmp = $files['tmp_name'];
            $filesize = $files['size'];
            $fileext = explode('.', $filename);
            $fileonlyname = $fileext['0'];
            $fileonlyext = $fileext['1'];
            $filecheck = strtolower(end($fileext));
            $allowed = array( 'jpg', 'jpeg', 'gif', 'png', 'bmp');
            if(in_array($filecheck, $allowed))
            {
            $destinationfile = "uploadimages/".$filename;
            move_uploaded_file($filetmp, $destinationfile);
            $errorattachment="false";
            $query2 = "INSERT INTO images(uid, img_dir) VALUES('$id', '$destinationfile')";
                if(!mysqli_query($conn,$query2))
                {
                    echo "Something went wrong please try again later";
                }
            }

        }
    }
}
?>