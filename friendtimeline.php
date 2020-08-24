<?php
   include('connection.php');
session_start();
  $id = $_GET['photo'];
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
  

    <section>
 		<?php
 			$select = "SELECT * FROM feed WHERE posted_by_id = '$id' ORDER BY id DESC";
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