<?php include 'conn.php'; ?>
<?php
	
	if($_SERVER["REQUEST_METHOD"]=="POST")
	{
		        $password=$_POST["password"];
            $fullname=$_POST["fullname"];
            $uname=$_POST["uname"];
            $ngo=$_POST["option"];
            $field=$_POST["field"];
            $email=$_POST["email"];
            $_SESSION['uerr']='';
            $_SESSION['emailerr']='';
            $number=$_POST["number"];
            echo $ngo;
         if (!filter_var($email, FILTER_VALIDATE_EMAIL) === true){
        		    $emailerr="Inavalid Email";
                $_SESSION['email']=$emailerr;
                $sql="SELECT * FROM user WHERE uname='$uname' LIMIT 1";
                $result=mysqli_query($conn,$sql);
                 $countu= mysqli_num_rows($result);
                 echo "in emailerr".$countu; 
                 if($countu==0)
                 {
                       $_SESSION['fullname']=$fullname;
                       $_SESSION['field']=$field;
                       $_SESSION['name']=$uname;
                       $_SESSION['emailerr']=$emailerr;
                       $_SESSION['email']='';
                       $_SESSION['number']=$number;
                       die(header('Location:signup1.php'));

                 }
                 else{
                       $uerr="USER NAME already taken";
                       $_SESSION['fullname']=$fullname;
                       $_SESSION['field']=$field;
                       $_SESSION['name']='';
                       $_SESSION['uerr']=$uerr;
                       $_SESSION['emailerr']=$emailerr;
                       $_SESSION['email']='';
                      $_SESSION['number']=$number;
                      die(header('Location:signup1 .php'));
                 }
        	}
              $sql="SELECT * FROM userdata WHERE uname='$uname' LIMIT 1";
                $result=mysqli_query($conn,$sql);
                 $countu= mysqli_num_rows($result);
                  $sql="SELECT * FROM userdata WHERE emailid='$email' LIMIT 1";
                  $result=mysqli_query($conn,$sql);
                  $counte= mysqli_num_rows($result);
               if($counte==1 && $countu==1)
               {
                       $uerr="USER NAME already taken";
                       $emailerr="email already taken";
                       $_SESSION['fullname']=$fullname;
                       $_SESSION['field']=$field;
                       $_SESSION['emailerr']=$emailerr;
                       $_SESSION['uerr']=$uerr;
                       $_SESSION['number']=$number;
                       die(header('Location:signup1.php'));


                }
                elseif($counte==1)
               {
                       
                       $emailerr="email already taken";
                       $_SESSION['fullname']=$fullname;
                       $_SESSION['field']=$field;
                       $_SESSION['name']=$uname;
                       $_SESSION['emailerr']=$emailerr;
                       $_SESSION['email']='';
                       $_SESSION['number']=$number;
                       
                        die(header('Location:signup1.php'));
                } 
                 elseif($countu==1)
               {
                       $uerr="USER NAME already taken";
                      $_SESSION['fullname']=$fullname;
                       $_SESSION['field']=$field;
                       $_SESSION['email']=$email;
                        $_SESSION['uerr']=$uerr;
                        $_SESSION['name']='';
                         $_SESSION['number']=$number; 
                        die(header('Location:signup1.php'));
                }

                        
            else{
                 if($ngo=="ngo"){ 
                 date_default_timezone_set("Asia/Kolkata");
                 $date=date("Y-m-d h:i:s");
                 $sql="INSERT INTO userdata(uname,emailid,password,dtime,full_name,field,mobile) VALUES ( '$uname', '$email', '$password','$date','$fullname','$field','$number')";
                 mysqli_query($conn,$sql);
                 die(header('Location:/ngo/login/nindex.php'));
                }
                else{
                        date_default_timezone_set("Asia/Kolkata");
                        $date=date("Y-m-d h:i:s");
                        $field='none';
                       $sql="INSERT INTO userdata(uname,emailid,password,dtime,full_name,field,mobile) VALUES ( '$uname', '$email', '$password','$date','$fullname','$field','$number')";
                        mysqli_query($conn,$sql);
                        die(header('Location:/ngo/login/nindex.php'));
                    }
              
            

         }
         
    }

?>