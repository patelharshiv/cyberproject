<?php 
      include ('connection.php');
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
               background-image: url("img/s.jpg");
               background-repeat: no-repeat;
               background-size: cover; 
               width: 100%;
               height: 100%;
               float: right;
            }
            #image
            {
            margin: 0;
            padding: 0;
            position: relative;
            }
            ul li{
            	display: inline;
            	padding: 20px;
            	float: right;
            }
    
</style>
</head>
<body>
	<ul class ="nav nav-tabs justify-content-end">
		  		<li class="nav-item">
    			<a class="nav-link active" href="registration.php">registration</a>
 			</li>
  			<li class="nav-item">
    			<a class="nav-link active" href="login.php">login</a>
 			</li>
 			

</ul>
</body>
</html>