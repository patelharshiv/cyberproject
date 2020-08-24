<!DOCTYPE html>
<html>
<head>
	<title>See Friends</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<style type="text/css">
	*{
		margin:0;
		padding: 0;
	}
#container{
			max-width: 70%;
			margin-left: 10%;
			margin-right: 10%;
			align-content: center;
			position: relative;
 
		}

		#profile{
			height: 250px;
			width: 30%;
			border-radius: 50%;
			position: absolute;
			top: 45%;
			left: 3%;
			border-color: blue;
			border-width: 10px;
		}
		#backgroundimage{
			width: 100%;
			height:500px;
			margin-top: 2%;
			border-width: 5px;
			border-color: black;
		}
#personalinfo{
	position: absolute;
	left: 40%;

}
#navcontainer li{
	list-style-type: none;
}
#navcontainer{
	background-color: darkslategray;
	max-width: 100%;
	padding: 20px;

}
#change{
	position: absolute;
	top: 83%;
	left: 9%;
}
			 #image{
  pointer-events: auto;
  max-height: 30px;
  max-width: 30px;
  cursor: pointer;
  background-color: darkslategray;
}
#ul div{
	background-color: white;
	pointer-events: auto;
	cursor: pointer;
}
</style>
<body>
	<nav id="navcontainer">
 <?php 
            if(!empty($_SESSION['firstname'])){?>
            <div class="w3-dropdown-hover">
            <li><img id="image" style=" 
  pointer-events: auto;
  max-height: 30px;
  max-width: 30px;
  cursor: pointer;" src="image/pp1.png" alt="avatar"></li>
            <div class="w3-dropdown-content w3-bar-block">
                <li class="w3-bar-item"><a  href="home.php"><?php echo $_SESSION['firstname']; ?></a></li>
                <li class="w3-bar-item"><a href="logout.php">Logout</a></li>
            </div>
        </div> 
         <?php 
      }
  ?>
   <form class="form-inline" action="/action_page.php" style="float: right;">
    <div id = "ul"><input class="form-control mr-sm-2" id="search" type="text" placeholder="Search" oninput="searchrecord()">
    <div id="searchresult" style="position:absolute;  width:100%;z-index: 2;"></div>
    	</div>
  </form>


</nav>
<div id="container"></div>


</body>
<script type="text/javascript">
$(document).ready(function(){
	searchfriends();
 	
 });	
var searchfriends = () => {
	var friends = "friends";
	  $.ajax({
            url:"seefriendsbackend.php",
            type:"post",
            data:{friends:friends},
            success:function(data){
              console.log(data);
              $("#container").html(data);
            }

    });

}
var searchrecord = () => {
		var search = $("#search").val();
		$.ajax({
				url:"searchbackend.php",
				type:"post",
				data:{search:search},
				success:function(data){
					console.log(data);
					$('#searchresult').html(data);
				}

			});
	}
</script>
</html>