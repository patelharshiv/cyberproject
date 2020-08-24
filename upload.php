<?php
    include('connection.php');
    session_start();
$id = $_SESSION['id'];

$query = "SELECT * from registration WHERE id='$id'";
$result = mysqli_query($conn, $query) or die( mysqli_error($conn));
while($row = mysqli_fetch_array($result)){



?>
<!DOCTYPE html>
<html>
<head>
	<title>php code</title>
</head>
<body>
	<form action="upload.php" method="post" enctype="multipart/form-data">
		<label>Username</label>
		<input type="text" name="username" id="username" value="<?php echo $row['firstname'] ?>">
		<label>Select Images</label>
		<input type="file" name="myfile">
		<button type="submit" name="submit" id="submit">Uploadimages</button>
		
	</form>

</body>
</html>
<?php
}
?>

<?php

if (isset($_POST['submit'])) 
{
  $username = $_POST['username'];
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
      else
      {
         $errorattachment="Something Went wrong Please try again";
      }
        echo $errorattachment;
  }
}
?>