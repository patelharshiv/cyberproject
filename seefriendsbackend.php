

<?php
include('connection.php');
session_start();
$id = $_SESSION['id'];
extract($_POST);
if (isset($_POST['friends'])) 
{
	$data1 = "";
	$data2 = "";
	$query = "SELECT * FROM friends WHERE uid ='$id'";
	$result = mysqli_query($conn, $query) or die( mysqli_error($conn));
	if(mysqli_num_rows($result) > 0)
	{
		while ($row = mysqli_fetch_array($result))
		{
			$id1 = $row['fid'];
			$query1 = "SELECT * FROM registration WHERE id='$id1'";
			$result1 = mysqli_query($conn,$query1) or die(mysqli_error($conn));
			$query6 = "SELECT * FROM images WHERE uid='$id1'";
			$result6 = mysqli_query($conn,$query6) or die(mysqli_error($conn));
			if(mysqli_num_rows($result6) > 0){
				$row6 = mysqli_fetch_array($result6);
				$img_dir = $row6['img_dir'];
			}else{
				$img_dir = "img/pp1.png";
			}
			$row1 = mysqli_fetch_array($result1);
			$data1 .= '<li><a href = "view.php?id='.$id1.'"><img src = "'.$img_dir.'" alt = "profilepic" width="50px" height="50px">'.$row1["firstname"]." ".$row1["lastname"].'</a></li>';
		}
		echo $data1;
		$query2 = "SELECT * FROM friends WHERE fid ='$id'";
		$result2 = mysqli_query($conn, $query2) or die( mysqli_error($conn));
		if(mysqli_num_rows($result2) > 0)
		{
		while ($row2 = mysqli_fetch_array($result2))
		{
			$id1 = $row2['uid'];
			$query3 = "SELECT * FROM registration WHERE id='$id1'";
			$result3 = mysqli_query($conn,$query3) or die(mysqli_error($conn));
			$query4 = "SELECT * FROM images WHERE uid='$id1'";
			$result4 = mysqli_query($conn,$query4) or die(mysqli_error($conn));
			if(mysqli_num_rows($result4) > 0){
				$row4 = mysqli_fetch_array($result4);
				$img_dir = $row4['img_dir'];
			}else{
				$img_dir = "img/pp1.png";
			}
			$row3 = mysqli_fetch_array($result3);
			$data2 .= '<li><a href = "view.php?id='.$id1.'"><img src = "'.$img_dir.'" alt = "profilepic" width="50px" height="50px">'.$row3["firstname"]." ".$row3["lastname"].'</a></li>';
		}
		echo $data2;
		}
	}
	else
	{
		$query = "SELECT * FROM friends WHERE fid ='$id'";
		$result = mysqli_query($conn, $query) or die( mysqli_error($conn));
		if(mysqli_num_rows($result) > 0)
		{
		while ($row = mysqli_fetch_array($result))
		{
			$id1 = $row['uid'];
			echo $id1;
			$query1 = "SELECT * FROM registration WHERE id='$id1'";
			$result1 = mysqli_query($conn,$query1) or die(mysqli_error($conn));
			$query4 = "SELECT * FROM images WHERE uid='$id1'";
			$result4 = mysqli_query($conn,$query4) or die(mysqli_error($conn));
			if(mysqli_num_rows($result4) > 0){
				$row4 = mysqli_fetch_array($result4);
				$img_dir = $row4['img_dir'];
			}else{
				$img_dir = "img/pp1.png";
			}
			$row1 = mysqli_fetch_array($result1);
			$data1 .= '<li><a href = "view.php?id='.$id1.'"><img src = "'.$img_dir.'" alt = "profilepic" width="50px" height="50px">'.$row1["firstname"]." ".$row1["lastname"].'</a></li>';
		}
		echo $data1;
		}else{
			echo "No friends";
		}
	}
}
?>