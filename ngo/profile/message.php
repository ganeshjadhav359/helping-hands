<?php include 'conn.php'; ?>
<?php
	//$conn= mysqli_connect("localhost","root","","help");
	if($_SERVER["REQUEST_METHOD"]=="POST")
	{
		        $title=$_POST["title"];
            $opt=$_POST["opt"];
            $tarea=$_POST["tarea"];
             $uid=$_SESSION['uid'];
             
            echo $tarea;
             date_default_timezone_set("Asia/Kolkata");
                 $date=date("Y-m-d G:i:s");
               // $sql="INSERT INTO postfeed(uid,title,mtime,field,message) VALUES ($uid,'$title','$date','$opt','$tarea')";
                 $sql="INSERT INTO postfeed(uid,title,mtime,field,message) VALUES ($uid,'$title','$date','$opt','$tarea')";
             if( mysqli_query($conn,$sql)){     
 		    die(header('Location: f3.php'));}
            else{
                echo "effrrjg"; 
            }
    }
    else{
        echo "post error";
    }

?>