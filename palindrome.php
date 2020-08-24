<?php
if(isset($_POST['submit']))
{
    
    $number = $_POST['number'];
    $sum =0;
    $m = $number;
    while($number > 0)
    {
        $reminder = $number % 10;
        $sum = ($sum * 10) + $reminder;

        $number = intval($number / 10);
    
    }
    if($sum == $m)
    {
      echo $m. " &nbsp is palindrome ";
    } 
    else
    {
        echo $m. " &nbsp is not palindrome ";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<form method="post" name="registraion" action="palindrome.php">
    <table border="0" align="center">
        <tr>
            <td>Number</td>
            <td><input type="text" placeholder="Enter Number" name="number"></td>
        </tr>
        <tr>
            <td>
                <input type="submit" value="submit" name="submit"></td>
        </tr>
    </table> 
</form>
</body>
</html>