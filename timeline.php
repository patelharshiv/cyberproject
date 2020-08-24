<?php
   include('connection.php');
session_start();
$userid = $_SESSION['id'];
if (isset($_POST['submit123'])) 
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
      date_default_timezone_set("Asia/Calcutta");
      $time = date("d-m-Y H:i:s");
      if(in_array($filecheck, $allowed))
      {
        $destinationfile = "uploadimages/".$filename;
        move_uploaded_file($filetmp, $destinationfile);
        $errorattachment="false";
        $query2 = "INSERT INTO feed(posted_by_id, posted_date,img_dir) VALUES('$userid', '$time', '$destinationfile')";
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
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Timeline</title>
	<style type="text/css">
		     #submit123{
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
	<form action="timeline.php" method="post" enctype="multipart/form-data">
        <label>Post the Update on timeline</label></br>
        <input type="file" name="myfile" id="myfile">
        <button type="submit" name="submit123" id="submit123">Upload Post</button>
    </form>
    <section>
 		<?php
 			$select = "SELECT * FROM feed WHERE posted_by_id = '$userid' ORDER BY id DESC";
 			$selectexe = mysqli_query($conn,$select);
 			if (mysqli_num_rows($selectexe) > 0)
            {
            	while ($row = mysqli_fetch_array($selectexe)){
            	?>
            	<img src="<?php echo $row['img_dir'];  ?>" alt="Timeline Update" style = "max-width: 30%; max-height: 30%">
              <span><?php  echo "Posted at:- ".$row['posted_date']; ?></span><br>
              <span><?php
              $id1 = $row['posted_by_id']; 
                $name = "SELECT * FROM registration WHERE id = '$id1'";
                $selectname = mysqli_query($conn,$name);
                $row12 = mysqli_fetch_array($selectname);
                echo "Posted By ".ucfirst($row12['firstname']). " ".ucfirst($row12['lastname']);
                 ?></span><hr></hr><?php
            }
            }else{
            	?><h1> No Updates </h1><?php
            }


 		?>
    </section>  
</body>
</html>