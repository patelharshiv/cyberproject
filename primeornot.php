<?php
$numbererr="";
$number="";
if(isset($_POST['submit'])=='submit')
{
   if (empty($_POST['number']))
   {
       $numbererr="number is required";
   } 
   else
   {
        $number=$_POST['number'];
   }
   if ($numbererr=="") 
   {
            $n= $_POST['number'];
            $count=0;
            $m=1;
             while ($count<$m) 
             {
                $flag=1;
                for ($i=2; $i<=$n-1 ; $i++) 
                {
                    if ($n%$i==0)
                    {
                       $flag=0;
                       break;   
                    }
                }

                if($flag==1)
                {
                  echo $n. " is prime";
                }  
                else
                {
                   echo $n."is not prime";
                }      
                    echo "</br>";
                    $count=$count+1;
            
                  $n++;
            }      
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<form method="post" name="registraion" action="primeornot.php">
    <table border="0" align="center">
        <tr>
            <td>Number</td>
            <td><input type="text" placeholder="Enter Number" name="number">
                <span><?php echo $numbererr?></span></td>
        </tr>
        <tr>
            <td>
                <input type="submit" value="submit" name="submit"></td>
        </tr>
    </table> 
</form>
</body>
</html>