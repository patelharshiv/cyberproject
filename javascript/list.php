<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div id="listing"></div>

</body>
<script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>

<script type="text/javascript">
   function listfun(page)

   { 
      $( "#listing" ).load( "list_view_javascript.php?page="+page);
   }
   $(document).ready(function(){
   	var page = 1;
   	listfun(page);
   });
</script>


</html>