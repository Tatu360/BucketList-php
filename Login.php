# this is user login form
<html>
    <head>
        <title> LOGIN HERE</title>
        <link rel="stylesheet" type="text/css" href="022.css"/>
        </head>
    <body>
    <div class="one">
      <img src="f5.png">
        <h3>LOGIN HERE</h3>
        <form action="" method="POST">
        <input type="text" class="now" name="Email" placeholder="Enter Your Email" required/>
        <input type="password"  class="now" name="password" placeholder="Password" required/>
        <input type="submit" class="button" name="submit" value="Login" required/>
       
            
            
        </form>
</div>

    </body>
</html>
<?php
if(isset($_POST['submit']))
{
    include 'DBconnect.php';
$Email=strtolower($_POST['Email']);
$Password=$_POST['password'];
$Password=  md5($password);
$sql="SELECT * FROM user WHERE Email='".$Email."' AND Password='".$password."';";
$result=mysqli_query($conn,$sql);
$check=mysqli_num_rows($result);


if($check){
    
            $_SESSION["Email"] =$Email;
            header("location:service/DashExample.php");
           
      
    }else 
    {
   
         echo "<div id=error_msg>"."password combination not match"."</div>";
            
    }
}
            
?>

