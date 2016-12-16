  <?php include 'conn.php'; ?>
<?php
	
	if($_SERVER["REQUEST_METHOD"]=="POST")
	{

    $uname=$_POST["uname"];
    $password=$_POST["password"];
    if(empty($uname) && empty($password))
      {  $error='PLEASE ENETR USERNAME AND PASSWORD';
         $_SESSION['error']=$error;
          die(header('Location:nindex.php'));
      }  
		
    if(empty($uname))
      {  $error='PLEASE ENTER USERNAME';
         $_SESSION['error']=$error;
          die(header('Location:nindex.php'));

      }  
      if(empty($password))
      {  $error='PLEASE ENTER PASSWORD';
         $_SESSION['error']=$error;
         $_SESSION['uname']=$uname;
          die(header('Location:nindex.php'));

      }  
      
		if(!filter_var($uname,FILTER_VALIDATE_EMAIL))
		    {
             
                $sql="SELECT * FROM userdata WHERE uname='$uname' LIMIT  1";
                $result=mysqli_query($conn,$sql);
                $result=mysqli_num_rows($result);
               if($result==0)
               {
                       $error="INCORRECT USERNAME";
                       $_SESSION['error']=$error;
                       $_SESSION['uname']='';
                        die(header('Location:nindex.php'));

                }
               else{
               	      $sql="SELECT * FROM userdata WHERE uname='$uname' AND password='$password' LIMIT 1";
               	      $result=mysqli_query($conn,$sql);
                      $result=mysqli_num_rows($result);
                     
                      
                      if($result!=0){
                         $result=mysqli_query($conn,$sql);
                        $result=mysqli_fetch_assoc($result);
                        $_SESSION['uid']=$result['uid'];
                        $_SESSION['field']=$result['field'];
                        if($result['field']=="none"){
                          die(header('Location:/ngo/profile/f3.php'));
                          // echo $result['field'];
                        }
                        else{
                          $_SESSION['field']=$result['field'];
                          // echo $result['field'];
                            die(header('Location:/ngo/ngoprofile/ngoprofile.php'));
                        }
                        //echo $result;
                        //echo $result['uid'];
                      
                      
                       }
                      else{
                      	$error="INCORRECT PASSWORD";
                        $_SESSION['error']=$error;
                         $_SESSION['uname']=$uname;
                         die(header('Location:nindex.php'));
                      } 
                  }

               }
              
         else{
                
             
                $sql="SELECT * FROM userdata WHERE emailid='$uname' LIMIT  1";
                $result=mysqli_query($conn,$sql);
                $result=mysqli_num_rows($result);
                
               if($result==0)
               {
                       $error="INCORRECT USERNAME";
                       $_SESSION['error']=$error;
                        $_SESSION['uname']='';
                        die(header('Location:nindex.php'));
                }
               else{
                      $sql="SELECT * FROM userdata WHERE emailid='$uname' AND password='$password' LIMIT 1";
                      $result=mysqli_query($conn,$sql);
                      $result=mysqli_num_rows($result);
                      if($result!=0){
                         $result=mysqli_query($conn,$sql);
                        $result=mysqli_fetch_assoc($result);
                        $_SESSION['uid']=$result['uid'];
                         $_SESSION['field']=$result['field'];
                        if($result['field']=="none"){
                          die(header('Location:/ngo/profile/f3.php'));
                        }
                        else{
                          $_SESSION['field']=$result['field'];
                            die(header('Location:/ngo/ngoprofile/ngoprofile.php'));
                        }
                        //echo $result;
                        //echo $result['uid'];
                      
                      
                       }
                      else{
                        $error="INCORRECT PASSWORD";
                        $_SESSION['error']=$error;
                         $_SESSION['uname']=$uname;
                         die(header('Location:nindex.php'));
                      } 
                  }

         }   
        
    }

?>