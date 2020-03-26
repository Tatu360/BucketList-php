<html>
  <head>
  
        <title> Regstration Form </title>
        <link rel="stylesheet" type="text/css" href="022.css"/>
   </head>
   <body>
   <div class="one">
      <img src="f5.png">
   <h3>USER REGISTRATION FORM </h3>
   <form action="" method="POST">
        
           <input type="text" class="now" name="FullName" placeholder="Enter Your Name" required/>
            <input type="text" class="now" name="Email" placeholder="Enter Your Email" required/>
            <input type="password"  class="now" name="password" placeholder="Password" required/>
            <input type="password"  class="now" name="password1" placeholder="Comfirm Your Password" required/>
            <input type="submit" class="button" name="submit" value="Register" required/>
      </form>
     </div>
   </body>     
</html>
<?php
if (isset ($_POST[ 'submit' ])) {
    include 'DBconnect.php';
   
  
   $FullName = $_POST['FullName'];
   $Email= $_POST['Email'];
   $Password =$_POST['password'] ;
   $Password1 = $_POST['password1'];

   $sql="SELECT * FROM user WHERE Email='".$Email."' OR FullName='".$FullName."'";
   $result=mysqli_query($conn,$sql);
      if(mysqli_num_rows($result)>0){
              echo "<div id=error_msg>"."user exit on system"."</div>";
        }  else {
            if($password!=$Password1){
           echo "<div id=error_msg>"."The two password does not match"."</div>";
}elseif ($password>4) {
    $_SESSION['message']="password is to short?> 6 $password";
}else{
$Password=md5($password);
$sql="INSERT INTO user(FullName,Email,Password) VALUES('$FullName','$Email','$password')";
if(mysqli_query($conn,$sql))
{
    echo "<div id=error_msg>"."The account created you can log in"."</div>";
}else
{
    echo "<div id=error_msg>"."Fail to Regist"."</div>";
}
        }

        }
        
   }


        
        
?>