<?php
      include('connection.php');
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
 
   <form action="list_view1.php" method="post">
      <input id="search"  type="text" placeholder="Type here" name="searchname">
      
      <button type="search" name="search" value="search"><i class="search"></i>search</button>
   </form>

</body>
</html>


<table border="1">
   
   </tbody>   
   <thead>
      <th>ID</th>
      <th>Firstname</th>
      <th>Lastname</th>
      <th>Email</th>
      <th>Mobilenumber</th>
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
         $start++;
         if(isset($_POST['search']))
         {
            $search = $_POST['searchname'];
            $select = "SELECT * from registration WHERE firstname LIKE '$search%'";

         }
         else
         {   
            $select = "SELECT * FROM registration LIMIT $start, $limit";//5 RECORD SHOW IN 1 PAGE BCZ LIMIT IS 5 
         }


         $selectexe = mysqli_query($conn, $select);//EXECUTION
         while ($row = mysqli_fetch_array($selectexe)) //TO FETCH ALL DATA FROME EXECUTION OF QUERY
         {
      ?>      
            <tr>
               <td><?php echo $row['id']; ?></td><!-- TO PRINT DATA TO LIST_VIEW IN TABLE -->
               <td><?php echo $row['firstname']; ?></td>
               <td><?php echo $row['lastname']; ?></td>
               <td><?php echo $row['email']; ?></td>
               <td><?php echo $row['mobilenumber']; ?></td>
               <td><input type='checkbox' name='delete[]' value='<?= $id ?>' ></td>
            </tr>
      <?php      
         }
      ?>   
    </tbody>
</table>
   <?php
      $query = "SELECT * from registration";
      $result = mysqli_query($conn, $query) or die( mysqli_error($conn));
      $count = mysqli_num_rows($result);
      echo "total record =".$count;     
   ?>
   </br>    
  <?php
         $countdata = "SELECT COUNT(*) FROM registration ";//count totle record
         $countdataexe = mysqli_query($conn, $countdata);//count data query

         $row1 = mysqli_fetch_array($countdataexe);//array from

         $totalrecord = $row1[0];//totle data to stor data in array from

         $totalpage = ceil ($totalrecord / $limit);

         $pagelink ="";
         for ($i=1; $i<=$totalpage; $i++) 
         { 

            $pagelink .= "<a href= 'list_view1.php?page=".$i."'>".$i."</a>&nbsp&nbsp";
         }
            echo $pagelink;

   ?> 
   