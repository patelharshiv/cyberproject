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
      <form action="acceptfriend.php" method="post">
         <input id="search"  type="search" placeholder="Type here" name="searchname">
         <button type="search" name="search" value="search"><i class="search"></i>search</button>
         

      </form>
         <table border="1">
      
         <thead>
            <th></th>
            <th>ID</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email</th>
            <th>Mobilenumber</th>
            <th>accept</th> 
            <th>reject</th>
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
            
            $select = "SELECT * FROM requests WHERE to1='$userid' AND state='pending'" ;//5 RECORD SHOW IN 1 PAGE BCZ LIMIT IS 5 
            $selectexe = mysqli_query($conn,$select);//EXECUTION
            if (mysqli_num_rows($selectexe) > 0)
            {
            echo "hiii";
            $row = mysqli_fetch_array($selectexe);
            $fid = $row['from1'];
            echo $fid;
            $select1 = "SELECT * FROM registration WHERE id ='$fid'" ;//5 RECORD SHOW IN 1 PAGE BCZ LIMIT IS 5 
            $selectexe1 = mysqli_query($conn,$select1);//EXECUTION

            while ($row1 = mysqli_fetch_array($selectexe1)) //TO FETCH ALL DATA FROME EXECUTION OF QUERY
            {
         ?>

            <tr>
               <td>
                  <input type="checkbox" name="checkbox[]" value="<?php echo $row1['id'];?>">
               </td>
               <td><?php echo $row1['id'];?></td><!-- TO PRINT DATA TO LIST_VIEW IN TABLE -->
               <td><?php echo $row1['firstname']; ?></td>
               <td><?php echo $row1['lastname']; ?></td>
               <td><?php echo $row1['email']; ?></td>
               <td><?php echo $row1['mobilenumber']; ?></td>

               <form method="POST" action="acceptreject.php">
                  <input type="hidden" name="acceptid" value="<?php echo $row1['id']?>">
                     <td>
                        <input name = "accept" type= "submit" id = "accept" value ="accept">
                     </td> 
               </form>
               <form method="POST" action="acceptreject.php"> 
                   <input type="hidden" name="rejectid" value="<?php echo $row1['id']?>">     
                     <td>
                        <input  name="reject" type="submit" id="reject" value="reject">
                     </td>     
               </form>
               <?php
               }
               }
               else{
                  echo "No new Friend Request";
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
   </body>
</html>