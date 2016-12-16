<?php
session_start();
 $error=null;
 $_SESSION['error']=$error;
 $_SESSION['uname']='';
 $conn= mysqli_connect("localhost","root","","help");


   if(mysqli_connect_errno()){

   	 echo "fail to connnect!".$mysqli_connect_error;
   }
?>