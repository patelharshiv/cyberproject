<?php
   include('connection.php');
?>
<!DOCTYPE html>
<html>
      <head>
         <title></title>
      </head>
   <body>
      <form action="list_view_javascript.php" method="post">
         <input id="search"  type="text" placeholder="Type here" name="searchname">
         <input type="submit" name="search" value="search"><i class="search"></i>
      
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
            <th>profile</th>
         </thead>
         
         <tbody>
         <?php
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
            
            $select = "SELECT * FROM registration $searchexe LIMIT $start, $limit";//5 RECORD SHOW IN 1 PAGE BCZ LIMIT IS 5 
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

               <form method="POST" action="list_view_javascript.php">
                  <input type="hidden" name="deleteid" value="<?php echo $row['id']?>">
                     <td>
                        <input name = "delete" type= "submit" id = "delete" value ="delete">
                     </td> 
               </form>
               <form method="POST" action="edit_javascript.php"> 
                   <input type="hidden" name="editid" value="<?php echo $row['id']?>">     
                     <td>
                        <input  name="edit" type="submit" id="edit" value="edit">
                     </td>     
               </form>

               <form method="POST" action="view_javascript.php">
                  <input type="hidden" name="viewid" value="<?php echo $row['id']?>">
                     <td>
                        <input name = "view" type= "submit" id = "view" value ="view">
                     </td> 
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


      <br />
      <a href="#" onclick="return loadfun();">registration</a>
      <div id="loadcontent"></div>

   </body>
</html>

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
      echo '<a href="#" onclick = "return listfun('.$i.');">'.$i.'</a>&nbsp&nbsp';
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


<script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>

<script type="text/javascript">
   function loadfun()

   { 
      $( "#loadcontent" ).load( "registration_javascript.php");
   }
</script>



   