<?php include'conn.php';?>
<?php
     $srid=$_GET['sr_no'];
     $sql="DELETE FROM postfeed WHERE sr_no='$srid' LIMIT 1";
     if(mysqli_query($conn,$sql)){
     	die(header('Location:mypost.php'));
     }
?>