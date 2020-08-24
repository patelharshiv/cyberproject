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
			top: 50%;
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
	width: 100%;
}
</style>
<body>
<div id="container" style=" z-index: 0;">
	
</div>
</body>
<script type="text/javascript">
$(document).ready(function(){
var queryString = decodeURIComponent(window.location.search);
var a = queryString.substring(1);
var b = a.slice(3,5);
console.log(b);
fetchpage(b);
 });
var fetchpage = (id) => {
	var id = id;
	 $.ajax({
            url:"searchpagebackend.php",
            type:"post",
            data:{uid:id},
            success:function(data){
                console.log(data);
                $('#container').html(data);
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
  	let friendshipstatus = id;
  	$.ajax({
				url:"searchpagebackend.php",
				type:"post",
				data:{friendshipstatus:friendshipstatus},
				success:function(data){
					console.log(data);
					if(data != ""){
						$('#seefriends').html(data);
					}
				}

			});
 }
     var directfriend = (data) => {
    	var queryString = "?id=" + data;
    	window.location.href = "searchpage.php" + queryString;
    }
	
</script>
</html>