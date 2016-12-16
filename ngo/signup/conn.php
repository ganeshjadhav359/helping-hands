<?php
session_start();
 $_SESSION['error']='';
 $_SESSION['uname']='';
 $_SESSION['email']='';
 $_SESSION['fullname']='';
 
 $conn= mysqli_connect("localhost","root","","help");


   if(mysqli_connect_errno()){

   	 echo "fail to connnect!".$mysqli_connect_error;
   }
?>