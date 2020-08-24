<?php
if (isset($_POST['submit']))
{
	$n= $_POST['number'];
	
	for($i=1;$i<=$n;$i++)
	{
	for($j=1;$j<=$i;$j++)
	{
		echo "*";
	}
	echo "<br>";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<form method="post" name="registraion" action="pattern3.php">
    <table border="0" align="center"> 
        <tr>
            <td>Number</td>
            <td><input type="text" placeholder="Enter Number" name="number" value="<?php echo isset($_POST['number']) ? $_POST['number'] : ''; ?>"></td>
        </tr>
        <tr>
            <td>
                <input type="submit" value="submit" name="submit"></td>
        </tr>
    </table> 
</form>
</body>
</html>