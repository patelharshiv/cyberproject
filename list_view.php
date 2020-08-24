<?php
   include('connection.php');
   session_start();

?>

<!DOCTYPE html>
<html>
      <head>
         <title></title>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
         <style type="text/css">
            *{
            margin: 0;
            padding: 0;
            }
            body
            {
               background-image: url("img/sun.png.JPG");
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
         </style>
      </head>
   <body>
      <form action="searchresult.php" method="post">
         <input id="search"  type="search" placeholder="Type here" name="searchname">
         <button type="search" name="search" value="search"><i class="search"></i>search</button>
         

      </form>
       <form action="list_view.php" method="post">
         <table border="1">
      
         <thead>
            <th></th>
            <th>ID</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email</th>
            <th>Mobilenumber</th>
            <th>deleteaction</th> 
            <th>edit</th> 
            <th></th>
            <th>add friend</th>
         </thead>
         
         <tbody>
         <?php
            $userid = $_SESSION['id'];
            $limit = 5;//print 5 record in 1 page
            if (isset($_GET["page"])) // TO SET PAGE
            {
                $page_no = $_GET["page"];//PAGE IS SET
            }
            else
            {
               $page_no = 1;//DISPLAY DEFULT PAGE
            }
            $start = ($page_no - 1) * $limit;
         
            $searchexe ="";
            
            $select = "SELECT * FROM registration $searchexe WHERE id != '$userid' LIMIT $start, $limit";//5 RECORD SHOW IN 1 PAGE BCZ LIMIT IS 5 
            $selectexe = mysqli_query($conn, $select);//EXECUTION
         
            while ($row = mysqli_fetch_array($selectexe)) //TO FETCH ALL DATA FROME EXECUTION OF QUERY
            {
         ?>

            <tr>
               <td>
                  <input type="checkbox" name="checkbox[]" value="<?php echo $row['id'];?>">
               </td>
               <td><?php echo $row['id'];?></td><!-- TO PRINT DATA TO LIST_VIEW IN TABLE -->
               <td><?php echo $row['firstname']; ?></td>
               <td><?php echo $row['lastname']; ?></td>
               <td><?php echo $row['email']; ?></td>
               <td><?php echo $row['mobilenumber']; ?></td>

               <form method="POST" action="list_view.php">
                  <input type="hidden" name="deleteid" value="<?php echo $row['id']?>">
                     <td>
                        <input name = "delete" type= "submit" id = "delete" value ="delete">
                     </td> 
               </form>
               <form method="POST" action="edit.php"> 
                   <input type="hidden" name="editid" value="<?php echo $row['id']?>">     
                     <td>
                        <input  name="edit" type="submit" id="edit" value="edit">
                     </td>     
               </form>

               <form method="POST" action="view.php">
                  <input type="hidden" name="viewid" value="<?php echo $row['id']?>">
                     <td>
                        <input name = "view" type= "submit" id = "view" value ="view">
                     </td> 
               </form>

                <form method="POST">
                  <?php
                  $fid = $row['id'];
        $query4 = "SELECT * FROM requests WHERE from1 = '$userid' AND to1 = '$fid'";
       $result3 = mysqli_query($conn, $query4) or die( mysqli_error($conn));
        $query5 = "SELECT * FROM requests WHERE from1 = '$fid' AND to1 = '$userid'";
       $result4 = mysqli_query($conn, $query5) or die( mysqli_error($conn));
       if(mysqli_num_rows($result3) > 0 || mysqli_num_rows($result4) > 0){
         if(mysqli_num_rows($result3) > 0){
         $row12 = mysqli_fetch_array($result3);
      }else{
                  $row12 = mysqli_fetch_array($result4);
      }

         $status = $row12['state'];
         if($status == "pending"){
             ?>
                  <td>
                        <button name = "add" type= "button" onclick="requestfriend('<?php echo $row['id']?>')" id = "add<?php echo $row['id'] ?>">Pending Request </button>
                     </td>
                     <?php
         }
         elseif($status == "Accepted"){
             ?>
                  <td>
                        <button name = "add" type= "button" onclick="requestfriend('<?php echo $row['id']?>')" id = "add<?php echo $row['id'] ?>">UNFRIEND</button>
                     </td>
                     <?php

         }
         else{
            ?>
                  <td>
                        <button name = "add" type= "button" onclick="requestfriend('<?php echo $row['id']?>')" id = "add<?php echo $row['id'] ?>">ADD FRIEND</button>
                     </td>
                     <?php

         }
       }else{
                  ?>
                  <td>
                        <button name = "add" type= "button" onclick="requestfriend('<?php echo $row['id']?>')" id = "add<?php echo $row['id'] ?>">ADD FRIEND</button>
                     </td>
                     <?php
                  }
                  ?> 
               </form>
            </tr> 
            <?php
               if (isset($_POST['delete'])) 
               {
                  $id = $_POST['deleteid'];
               
                  $sql = "DELETE FROM registration WHERE id = $id" ;
                  $result = mysqli_query($conn, $sql) or die( mysqli_error($conn));
               }
            ?>
            
         <?php
            } 
         ?>     
      </tbody>
      </table>
      </br>
      <tr>
         <td>
            <input type="submit" name="delete" value="multipale delete">
         </td>
      </tr>
      </form>
      <script type="text/javascript">

          var requestfriend = (id) => {
   console.log(id);
   var id = id;
         $.ajax({
            url:"searchpagebackend.php",
            type:"post",
            data:{friendid:id},
            success:function(data){
               console.log(data);
               $('#searchresult').html(data);
               checkfriendshipstatus(data);
            }

         });

 }

  var checkfriendshipstatus = (id) => {
   var friendshipstatus = id;
   $.ajax({
            url:"searchpagebackend.php",
            type:"post",
            data:{friendshipstatus:friendshipstatus},
            success:function(data){
               console.log(data);
               if(data != ""){
                  console.log("hiii");
                  var join = "add"+friendshipstatus;
                  console.log(join);
                  $('#join').html(data);
               }
            }

         });
 }
         
      </script>
   </body>
</html>
</br>

<?PHP
   $countdata = "SELECT COUNT(*) FROM registration $searchexe";//count totle record
   $countdataexe = mysqli_query($conn, $countdata);//count data query
   $row1 = mysqli_fetch_array($countdataexe);//array from
   $totalrecord = $row1[0];//totle data to stor data in array from
   echo "totalrecord =" .$totalrecord."<br>";
   $totalpage = ceil ($totalrecord / $limit);
   $pagelink ="";
   for ($i=1; $i<=$totalpage; $i++) 
   { 
      $pagelink .= "<a href= 'list_view.php?page=".$i."'>".$i."</a>&nbsp&nbsp";
   }
   echo $pagelink; 
?> 

<?php
if (isset($_POST['delete'])) 
{
   $checkbox = $_POST['checkbox'];
   for ($i=0; $i<count($checkbox) ; $i++) 
   { 
      $del = $checkbox[$i];
      $sqldel = "DELETE FROM registration WHERE id= $del"; 
      $sqldelexe =mysqli_query($conn,$sqldel);
   }
}
?>

<?php
if(isset($_POST['submitedit']))
{
   $editid = $_POST['editid'];
   $firstnameedit = $_POST['firstnameedit'];
   $lastnameedit = $_POST['lastnameedit'];
   $emailedit = $_POST['emailedit'];
   $mobilenumberedit = $_POST['mobilenumberedit'];
   $editsubmitquery = "UPDATE registration SET firstname='$firstnameedit', lastname='$lastnameedit', email = '$emailedit', mobilenumber = '$mobilenumberedit' WHERE id=$editid"; 
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


