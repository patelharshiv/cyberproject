<?php

   include('connection.php');
?>
  <!DOCTYPE html>
  <html>
  <head>
    <title></title>
  </head>
  <body>
    <?php
    if(isset($_POST['search'])){
   $data = "";
   $search = $_POST['searchname'];
   if(empty($search)){
      $data .="" ;
      echo $data;
   }else{
   $query = "SELECT * from registration WHERE firstname LIKE '$search%'";
   $result = mysqli_query($conn, $query) or die( mysqli_error($conn));
   if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
  $data .= "<div onclick='directfriend(".$row['id'].")'>" .$row['firstname']. " " . $row['lastname']."</div>";
    echo  $data;
  }
} else {
  $data.= "<li>No results Found</li>";
}
}
  }
  ?>
  
  <script type="text/javascript">
       var directfriend = (data) => {
      var queryString = "?id=" + data;
      window.location.href = "search.php" + queryString;
    }
  </script>
  </body>
  </html>