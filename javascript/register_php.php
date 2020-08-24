<?php
    include ('connection.php');
?>


<?php
$Firstnameerr = $Lastnameerr = $Emailerr = $Mobilenumbererr = $Passworderr = "";

$firstname = $lastname = $email = $mobilenumber = $password = "";

if(isset($_POST['firstname']))
{
echo "here";
    
    if (empty($_POST['firstname']))
    {
      echo $Firstnameerr="Firstname is requierd";
    } 
    else
    {
        $firstname = $_POST['firstname'];      
        //echo $firstname;
    }
    
    if (empty($_POST['lastname']))
    {
      echo $Lastnameerr="lastname is requierd";
    } 
    else
    {
        $lastname = $_POST['lastname'];
        //echo $lastname;      
    }

    if (empty($_POST['email']))
    {
      $Emailerr="email is requierd";
    } 
    else
    {
        $email = $_POST['email']; 
       // echo $email;     
    }
    
    if (empty($_POST['mobilenumber']))
    {
      $Mobilenumbererr="mobilenumber is requierd";
    } 
    else
    {
        $mobilenumber = $_POST['mobilenumber']; 
        //echo $mobilenumber;     
    }
    
    if (empty($_POST['password']))
    {
      $Passworderr="password is requierd";
    } 
    else 
    {
        $password = $_POST['password'];
        //echo $password;   
    }
    
    $Firstname = $_POST['firstname'];
    $Lastname = $_POST['lastname'];
    $Email = $_POST['email'];
    $Mobilenumber = $_POST['mobilenumber'];
    $Password = $_POST['password'];


    //$Firstnameerr = $Lastnameerr = $Em ailerr = $Mobilenumbererr = $Passworderr = "";
    if( $Firstnameerr != '' || $Lastnameerr != '' || $Emailerr !='' || $Mobilenumbererr !='' || $Passworderr !='')
    {
        echo "check error";
    }
    else
    {

        $sql = "select email from registration where email='$Email'";
        $sqlexe = mysqli_query($conn, $sql);

        if ($sqlexe ->num_rows > 0) 
        {

            echo "Email already exiest";
        }
        else
        {
            $insert = "INSERT INTO registration (firstname, lastname, email, mobilenumber, password ) VALUES ('$Firstname','$Lastname','$Email','$Mobilenumber','$Password')";
            $insertexe = mysqli_query($conn, $insert);
            if ($insertexe)
            {
                echo "Insert Data";
            }
            else
            {
                echo "Not inserted Data";
            }

            exit();
        }
    }   
}  
?>