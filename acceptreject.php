<?php
   include('connection.php');
   session_start();

   $id = $_SESSION['id'];
if(isset($_POST['acceptid'])){
$acceptid = $_POST['acceptid'];
$query = "UPDATE requests SET state='Accepted' WHERE from1='$acceptid' AND to1 = '$id'";
  if(!mysqli_query($conn,$query))
  {
    echo "there was an error";
  }else{
    $query2 = "INSERT into friends(uid,fid) VALUES('$id','$acceptid')";
    if(!mysqli_query($conn,$query2))
    {
      echo "Something went wrong please try again later";
    }else{
     header("Location: newlist.php"); 
    }

  }


}


if(isset($_POST['rejectid'])){
  $rejectid = $_POST['rejectid'];
$query = "UPDATE requests SET state='rejected' WHERE from1='$rejectid' AND to1 = '$id'";
  if(!mysqli_query($conn,$query))
  {echo "there was an error";}else{
    echo "You Rejected Request";
  }
  header("Location: home.php"); 

}


?>