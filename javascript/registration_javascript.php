<!DOCTYPE html>
<html>
<head>
	<title></title>
    
</head>
<body>

<form method="post" id="formbox" name="registraion" >
 	<table border="0" align="center">
        
		<tr>
			<td>First name</td>
			<td><input type="text" placeholder="Enter firstname" name="firstname" id="firstname"></td>
		</tr>
		<tr>
			<td>Last name</td>
			<td><input type="text" placeholder="Enter lastname" name="lastname" id="lastname"></td>
		</tr>
		<tr>
			<td>Email</td>
			<td><input type="text" placeholder="email" name="email" id="email"></td>
		</tr>
		<tr>
			<td>Mobile number</td>
			<td><input type="text" placeholder="mobilenumber" name="mobilenumber" id="mobilenumber"></td>
		</tr>
		<tr>
			<td>Password</td>
			<td><input type="password" placeholder="Enter password" name="password" id="password"></td>
		</tr>
        <!-- <tr>
            <td><button name="submit" value="submit"><input type="hidden" name="submit" value="submit" onclick="return loadfun();">submit</button></td>
        </tr>  -->
		 <tr>
			<td>
				<button name="submit" value="submit" onclick="return loadfun();">submit            
                </button> </td>
        </tr> 
    </table>  
</form>
<div id="success"></div>
      <br/>
</body>
</html>
<script>
    function validateForm() 
    {
        var firstname = document.forms["registraion"]["firstname"].value;
        if (firstname == "") 
        {
            alert("firstname must be filled out");
            return false;
        }

        var lastname = document.forms["registraion"]["lastname"].value;
        if (lastname =="") 
        {
            alert("lastname must be filled out");
            return false;
        } 

        var email = document.forms["registraion"]["email"].value;
        if (email =="") 
        {
            alert("email must be filled out");
            return false;
        } 

        var mobilenumber = document.forms["registraion"]["mobilenumber"].value;
        if (mobilenumber =="") 
        {
            alert("mobilenumber must be filled out");
            return false;
        } 

        var password = document.forms["registraion"]["password"].value;
        if (password =="") 
        {
            alert("password must be filled out");
            return false;
        }

        return true;    
    }
</script> 
<script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
<script type="text/javascript">
   function loadfun()

   { 
        
      if(validateForm()){  
          $.ajax({
                type:"POST",
                url:"register_php.php",
                data:$('#formbox').serialize(),
                success:function(response)
                {
                    alert(response);
                    $('#success').html(response);
                }
            });
       
      }
        return false;
      

    } 
</script>



 