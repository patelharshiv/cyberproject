<?php
   include('connection.php');
   session_start();

     $firstname = $lastname = $email = $mobilenumber = "";
   if (isset($_GET['id']))
    {
       $id = $_GET['id']; 
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
  <style type="text/css">
  *{
            margin: 0;
            padding: 0;
            }
            body
  
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
        #btn,#friend,#photo{
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
  <form method="post" name="registraion" action="list_view.php"> 
    <div id="container">
        <div class="form-group">   
        <label>First name</label>
        <input type="text" placeholder="Enter firstname" name="firstnameview" id="firstname" value="<?php echo $firstname ?>">
      </div>
      <div class="form-group">
        <label>Last name</label>
        <input type="text" placeholder="Enter lastname" name="lastnameview" id="lastname" value="<?php echo $lastname ?>">
      </div>
      <div class="form-group">
        <label>Email</label>
              <input type="text" placeholder="Enter email" name="emailview" id="view" value="<?php echo $email ?>">
      </div>
      <div class="form-group">
        <label>Mobile number</label>
        <input type="text" placeholder="mobilenumber" name="mobilenumberview" id="mobilenumber" value="<?php echo $mobilenumber ?>">
      </div>
      <div>
        </form>
      <form method="get" name="registraion" action="friendfriends.php"> 
          <input type="hidden" name="friendid" value="<?php echo  $_GET['id']; ?>">
          <button type="submit" value="friend" name="friend" id="friend">friend</button>
        </div>
      </form>
      <form method="get" name="registraion" action="friendtimeline.php"> 
        <div>
          <input type="hidden" name="friendid" value="<?php echo  $_GET['id']; ?>">
          <button type="photo" value="<?php echo  $_GET['id']; ?>" name="photo" id="photo">photo</button>
        </div>
      </form>
      <form method="post" name="registraion" action="final.php"> 
        <div>
          <button type="back" value="back" name="back" id="btn">back</button>
        </div>
      </form>
    </div>  
</body>
</html>