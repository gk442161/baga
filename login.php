<?php
    include 'php/mysql_login.php';

    $conn=new mysqli($hostname,$username,$password,$database);
    if($conn->connect_error) die($conn->connect_error);
echo"siginiing page validation";

if(isset($_POST['username']) && isset($_POST["password"]))
{
    $username=get_post($conn,'username');
    echo $username;
    $pass=get_post($conn,'password');
    $hashed_pass=md5($pass);
    echo $hashed_pass;
    $result=$conn->query("SELECT password FROM main_login WHERE username='$username'");
    
    if(!$result){
        printf("Error1: %s\n", $conn->sqlstate);
    }
    else{
        
       $match=mysqli_fetch_assoc($result)['password'];
       if($match==$hashed_pass){
           session_start();
           $_SESSION['username']=$username;
           print("password matched"); 
           echo $_SESSION['username'];
           ?><html>
    <body>
        
    
        <button ><a href='logout.php'>logout</button>
        </form>
    </body>
    </html> <?php

       }else{
           echo"INVALID PASSWORD";
           
       }
    }


}
?>
  