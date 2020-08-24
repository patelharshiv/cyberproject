<?php
session_start();
$db_hostname = 'localhost';
$db_database = 'cyber';
$db_username = 'root';
$db_password = '';
$conn=mysqli_connect($db_hostname, $db_username, $db_password, $db_database);
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  $errorattachment = "true";
  $id = $_SESSION['id'];
extract($_POST);
if(isset($_POST['uid'])){
  $id1 = $_POST['uid'];
  $data = "";
  $query = "SELECT * FROM registration WHERE id = '$id1'";
  $query1 = "SELECT * FROM images WHERE id = '$id1'";
   $result = mysqli_query($conn, $query) or die( mysqli_error($conn));
  $result1 = mysqli_query($conn, $query1) or die( mysqli_error($conn));
    if(mysqli_num_rows($result) > 0 && mysqli_num_rows($result1) > 0){
    while($row = mysqli_fetch_array($result)){
            $query6 = "SELECT * FROM registration WHERE id = '$id'";
       $result6 = mysqli_query($conn, $query6) or die( mysqli_error($conn));
       $row6 = mysqli_fetch_array($result6);
      $row1 = mysqli_fetch_array($result1);
      $firstname = $row['firstname'];
      $id2 = $row['id'];
      $joint = $firstname.$id2;
      $firstname1 = $row6['firstname'];
      $joint1 = $firstname1.$id;
      $img_dir = $row1['img_dir'];
      if(empty($img_dir)){
        $img_dir="image/pp1.png";
      }else{
        $img_dir = $img_dir;
      }
       $query2 = "SELECT * FROM friends WHERE fid = '$id' AND uid = '$id1'";
      $result2 = mysqli_query($conn, $query2) or die( mysqli_error($conn));
      $query5 = "SELECT * FROM friends WHERE fid = '$id1' AND uid = '$id'";
      $result5 = mysqli_query($conn, $query5) or die( mysqli_error($conn));
      if(mysqli_num_rows($result2) > 0 || mysqli_num_rows($result5) > 0 ){
                 $data .='<form method="post" enctype="multipart/form-data">
      <center><img src="'.$img_dir.'" alt= "Your Profile" id ="profile"></center>
        <button type="button" style="position: absolute; top: 83%; left: 80%;" id="seefriends" class="btn btn-primary" disabled>FRIENDS</button>
      <div id="firstname"><b>'.$row["firstname"] . ' ' . $row["lastname"].'</b></div>
      <div id="personalinfo">
          <h2><label>Personal Details</label></h2>
<div class="form-group">
<label for="FirstName:">FirstName:</label>
<input type="text" name="fname" value="'.$row["firstname"].'" id="fname" class="form-control" required="required" disabled>
</div>
<div class="form-group">
<label for="LastName:">LastName:</label>
<input type="text" name="lname" value="'.$row["lastname"].'" id="lname" class="form-control" required="required" disabled>
</div>
<div class="form-group">
<label for="E-mail:">E-mail:</label>
<input type="email"  name="email" id="email" class="form-control" value="'.$row["email"].'" required="required" disabled> 
</div>
<div class="form-group">
<label for="PhoneNo:">PhoneNo:</label>
<input type="text" name="mno" value="'.$row["mno"].'" id="mno" required="required" class="form-control" disabled>
</div>
</div>
</form>';
 echo $data;
      }else if(mysqli_num_rows($result5) > 0){
         $data .='<form method="post" enctype="multipart/form-data">
      <center><img src="'.$img_dir.'" alt= "Your Profile" id ="profile"></center>
        <button type="button" style="position: absolute; top: 83%; left: 80%;" id="seefriends" class="btn btn-primary" disabled>FRIENDS</button>
      <div id="firstname"><b>'.$row["firstname"] . ' ' . $row["lastname"].'</b></div>
      <div id="personalinfo">
          <h2><label>Personal Details</label></h2>
<div class="form-group">
<label for="FirstName:">FirstName:</label>
<input type="text" name="fname" value="'.$row["firstname"].'" id="fname" class="form-control" required="required" disabled>
</div>
<div class="form-group">
<label for="LastName:">LastName:</label>
<input type="text" name="lname" value="'.$row["lastname"].'" id="lname" class="form-control" required="required" disabled>
</div>
<div class="form-group">
<label for="E-mail:">E-mail:</label>
<input type="email"  name="email" id="email" class="form-control" value="'.$row["email"].'" required="required" disabled> 
</div>
<div class="form-group">
<label for="PhoneNo:">PhoneNo:</label>
<input type="text" name="mno" value="'.$row["mno"].'" id="mno" required="required" class="form-control" disabled>
</div>
</div>
</form>';
 echo $data;
      }else{
        $query3 = "SELECT * FROM requests WHERE from1= '$id' AND to1 = '$id1'";
        $result3 = mysqli_query($conn, $query3) or die( mysqli_error($conn));
        $query4 = "SELECT * FROM requests WHERE from1= '$id1' AND to1 = '$id'";
        $result4 = mysqli_query($conn, $query4) or die( mysqli_error($conn));
        if(mysqli_num_rows($result3) > 0){
          echo "hello request from your side";
          $row3 = mysqli_fetch_array($result3);
          $state = $row3['state'];
          if ($state == "Accepted") {
         $data .='<form method="post" enctype="multipart/form-data">
      <center><img src="'.$img_dir.'" alt= "Your Profile" id ="profile"></center>
        <button type="button" style="position: absolute; top: 83%; left: 80%;" id="seefriends" class="btn btn-primary" >FRIENDS</button>
      <div id="firstname"><b>'.$row["firstname"] . ' ' . $row["lastname"].'</b></div>
      <div id="personalinfo">
          <h2><label>Personal Details</label></h2>
<div class="form-group">
<label for="FirstName:">FirstName:</label>
<input type="text" name="fname" value="'.$row["firstname"].'" id="fname" class="form-control" required="required" disabled>
</div>
<div class="form-group">
<label for="LastName:">LastName:</label>
<input type="text" name="lname" value="'.$row["lastname"].'" id="lname" class="form-control" required="required" disabled>
</div>
<div class="form-group">
<label for="E-mail:">E-mail:</label>
<input type="email"  name="email" id="email" class="form-control" value="'.$row["email"].'" required="required" disabled> 
</div>
<div class="form-group">
<label for="PhoneNo:">PhoneNo:</label>
<input type="text" name="mno" value="'.$row["mno"].'" id="mno" required="required" class="form-control" disabled>
</div>
</div>
</form>';
 echo $data;
          }else if($state == "pending" ){
 $data .='<form method="post" enctype="multipart/form-data">
      <center><img src="'.$img_dir.'" alt= "Your Profile" id ="profile"></center>
        <button type="button" style="position: absolute; top: 83%; left: 80%;" id="seefriends" class="btn btn-primary" onclick="requestfriend('.$row["id"].')" disabled>PENDING</button>
      <div id="firstname"><b>'.$row["firstname"] . ' ' . $row["lastname"].'</b></div>
      <div id="personalinfo">
          <h2><label>Personal Details</label></h2>
<div class="form-group">
<label for="FirstName:">FirstName:</label>
<input type="text" name="fname" value="'.$row["firstname"].'" id="fname" class="form-control" required="required" disabled>
</div>
<div class="form-group">
<label for="LastName:">LastName:</label>
<input type="text" name="lname" value="'.$row["lastname"].'" id="lname" class="form-control" required="required" disabled>
</div>
<div class="form-group">
<label for="E-mail:">E-mail:</label>
<input type="email"  name="email" id="email" class="form-control" value="'.$row["email"].'" required="required" disabled> 
</div>
<div class="form-group">
<label for="PhoneNo:">PhoneNo:</label>
<input type="text" name="mno" value="'.$row["mno"].'" id="mno" required="required" class="form-control" disabled>
</div>
</div>
</form>';

 echo $data;
          }else{
             $data .='<form method="post" enctype="multipart/form-data">
      <center><img src="'.$img_dir.'" alt= "Your Profile" id ="profile"></center>
        <button type="button" style="position: absolute; top: 83%; left: 80%;" id="seefriends" class="btn btn-primary" onclick="requestfriend('.$row["id"].')">ADD FRIEND</button>
      <div id="firstname"><b>'.$row["firstname"] . ' ' . $row["lastname"].'</b></div>
      <div id="personalinfo">
          <h2><label>Personal Details</label></h2>
<div class="form-group">
<label for="FirstName:">FirstName:</label>
<input type="text" name="fname" value="'.$row["firstname"].'" id="fname" class="form-control" required="required" disabled>
</div>
<div class="form-group">
<label for="LastName:">LastName:</label>
<input type="text" name="lname" value="'.$row["lastname"].'" id="lname" class="form-control" required="required" disabled>
</div>
<div class="form-group">
<label for="E-mail:">E-mail:</label>
<input type="email"  name="email" id="email" class="form-control" value="'.$row["email"].'" required="required" disabled> 
</div>
<div class="form-group">
<label for="PhoneNo:">PhoneNo:</label>
<input type="text" name="mno" value="'.$row["mno"].'" id="mno" required="required" class="form-control" disabled>
</div>
</div>
</form>';
echo $data;
          }
        }else if(mysqli_num_rows($result4) > 0){
          echo "hello request to you from your friend";
          $row4 = mysqli_fetch_array($result4);
          $state = $row4['state'];
          if ($state == "Accepted") {
         $data .='<form method="post" enctype="multipart/form-data">
      <center><img src="'.$img_dir.'" alt= "Your Profile" id ="profile"></center>
        <button type="button" style="position: absolute; top: 83%; left: 80%;" id="seefriends" class="btn btn-primary" disabled >FRIENDS</button>
      <div id="firstname"><b>'.$row["firstname"] . ' ' . $row["lastname"].'</b></div>
      <div id="personalinfo">
          <h2><label>Personal Details</label></h2>
<div class="form-group">
<label for="FirstName:">FirstName:</label>
<input type="text" name="fname" value="'.$row["firstname"].'" id="fname" class="form-control" required="required" disabled>
</div>
<div class="form-group">
<label for="LastName:">LastName:</label>
<input type="text" name="lname" value="'.$row["lastname"].'" id="lname" class="form-control" required="required" disabled>
</div>
<div class="form-group">
<label for="E-mail:">E-mail:</label>
<input type="email"  name="email" id="email" class="form-control" value="'.$row["email"].'" required="required" disabled> 
</div>
<div class="form-group">
<label for="PhoneNo:">PhoneNo:</label>
<input type="text" name="mno" value="'.$row["mno"].'" id="mno" required="required" class="form-control" disabled>
</div>
</div>
</form>';
 echo $data;
          }else if($state == "pending" ){
$data .= '<form method="post" enctype="multipart/form-data">
      <center><img src="'.$img_dir.'" alt= "Your Profile" id ="profile"></center>
      <img src="image/accept.png" alt ="accept" style="width:30px; height:30px; position: absolute; top: 90%; left: 80%; cursor:pointer;" onclick="acceptfunc('.$id1.')">
      <img src="image/wrong.png" alt ="reject" style="width:30px; height:30px; position: absolute; top: 90%; left: 86%; cursor:pointer;" onclick="rejectfunc('.$id1.')">
      <div id="firstname"><b>'.$row["firstname"] . ' ' . $row["lastname"].'</b></div>
      <div id="personalinfo">
          <h2><label>Personal Details</label></h2>
<div class="form-group">
<label for="FirstName:">FirstName:</label>
<input type="text" name="fname" value="'.$row["firstname"].'" id="fname" class="form-control" required="required" disabled>
</div>
<div class="form-group">
<label for="LastName:">LastName:</label>
<input type="text" name="lname" value="'.$row["lastname"].'" id="lname" class="form-control" required="required" disabled>
</div>
<div class="form-group">
<label for="E-mail:">E-mail:</label>
<input type="email"  name="email" id="email" class="form-control" value="'.$row["email"].'" required="required" disabled> 
</div>
<div class="form-group">
<label for="PhoneNo:">PhoneNo:</label>
<input type="text" name="mno" value="'.$row["mno"].'" id="mno" required="required" class="form-control" disabled>
</div>
</div>
</form>';
 echo $data;
          }else{
             $data .='<form method="post" enctype="multipart/form-data">
      <center><img src="'.$img_dir.'" alt= "Your Profile" id ="profile"></center>
        <button type="button" style="position: absolute; top: 83%; left: 80%;" id="seefriends" class="btn btn-primary" onclick="requestfriend('.$row["id"].')">ADD FRIEND</button>
      <div id="firstname"><b>'.$row["firstname"] . ' ' . $row["lastname"].'</b></div>
      <div id="personalinfo">
          <h2><label>Personal Details</label></h2>
<div class="form-group">
<label for="FirstName:">FirstName:</label>
<input type="text" name="fname" value="'.$row["firstname"].'" id="fname" class="form-control" required="required" disabled>
</div>
<div class="form-group">
<label for="LastName:">LastName:</label>
<input type="text" name="lname" value="'.$row["lastname"].'" id="lname" class="form-control" required="required" disabled>
</div>
<div class="form-group">
<label for="E-mail:">E-mail:</label>
<input type="email"  name="email" id="email" class="form-control" value="'.$row["email"].'" required="required" disabled> 
</div>
<div class="form-group">
<label for="PhoneNo:">PhoneNo:</label>
<input type="text" name="mno" value="'.$row["mno"].'" id="mno" required="required" class="form-control" disabled>
</div>
</div>
</form>';
echo $data;
          }
        }else{
 $data .='<form method="post" enctype="multipart/form-data">
      <center><img src="'.$img_dir.'" alt= "Your Profile" id ="profile"></center>
        <button type="button" style="position: absolute; top: 83%; left: 80%;" id="seefriends" class="btn btn-primary" onclick="requestfriend('.$row["id"].')">ADD FRIEND</button>
      <div id="firstname"><b>'.$row["firstname"] . ' ' . $row["lastname"].'</b></div>
      <div id="personalinfo">
          <h2><label>Personal Details</label></h2>
<div class="form-group">
<label for="FirstName:">FirstName:</label>
<input type="text" name="fname" value="'.$row["firstname"].'" id="fname" class="form-control" required="required" disabled>
</div>
<div class="form-group">
<label for="LastName:">LastName:</label>
<input type="text" name="lname" value="'.$row["lastname"].'" id="lname" class="form-control" required="required" disabled>
</div>
<div class="form-group">
<label for="E-mail:">E-mail:</label>
<input type="email"  name="email" id="email" class="form-control" value="'.$row["email"].'" required="required" disabled> 
</div>
<div class="form-group">
<label for="PhoneNo:">PhoneNo:</label>
<input type="text" name="mno" value="'.$row["mno"].'" id="mno" required="required" class="form-control" disabled>
</div>
</div>
</form>';
echo $data; 
      }
      }

    }//while
}//result and result1
 
}



if(isset($_POST['friendid'])){
  $fid = $_POST['friendid'];
  $query = "INSERT INTO requests(from1, to1, state) VALUES('$id', '$fid', 'pending')";
    if(!mysqli_query($conn,$query))
  {
    echo "Something went wrong please try again later";
  }
  else
  {
    echo $fid;
  }
}


if(isset($_POST['friendshipstatus'])){
        $id1 = $_POST['friendshipstatus'];
        $query4 = "SELECT * FROM requests WHERE from1 = '$id' AND to1 = '$id1'";
       $result3 = mysqli_query($conn, $query4) or die( mysqli_error($conn));
       if(mysqli_num_rows($result3) > 0){
        $row42 = mysqli_fetch_array($result3);
        $to = $row42['to1'];
        if($to == $id1){
        $discl = $row42['state'];
          echo $discl;
        }
      }
    

}
?>