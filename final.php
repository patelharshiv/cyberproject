<?php
   include('connection.php');
   session_start();
$userid = $_SESSION['id'];
$firstname = $_SESSION['firstname'];
$lastname = $_SESSION['lastname'];
$img_dir = $_SESSION['img_dir'];
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: right;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #4CAF50;
  color: white;
}
.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>
</head>
<body>

<div class="topnav">
  <div id="image">
        <img src="img/k6.jpeg" style="width: 18%;
      height:60px;">
      </div>
  <a href="login1.php"><img src = "<?php echo $img_dir ?>" alt = "profilepic" width="50px" height="50px" style="border-radius: 50%;"><?php echo ucfirst($firstname)." ".ucfirst($lastname);  ?></a>
  <a href="logout.php">logout</a>
</div>
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="login1.php"><img src = "<?php echo $img_dir ?>" alt = "profilepic" width="50px" height="50px" style="border-radius: 50%;"><?php echo ucfirst($firstname)." ".ucfirst($lastname);  ?></a>
  <a href="seefriends.php">seefriend</a>
  <a href="timeline.php">uploadimg</a>
  <a href="friendrequest.php">friendrequest</a>
</div>

<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>

<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>
    <section>
    <?php

      $select = "SELECT * FROM feed ORDER BY id DESC";
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
                $fname = $row12['firstname'];
                $lname = $row12['lastname'];
                $id = $row12['id'];
                ?>
                <a href="view.php?id=<?php echo $id; ?>">
                  <?php echo ucfirst($fname)." ".ucfirst($lname); ?>
                </a>
                
                 </span>
                 <hr></hr><?php
            }
            }
            else
            {
              ?><h1> No Updates </h1><?php
            }
    ?>
    </section>
    <form method="POST" action="final.php">
      <input type="hidden" name="viewid" value="<?php echo $id; ?>">  
    </form>  
</body>
</html>