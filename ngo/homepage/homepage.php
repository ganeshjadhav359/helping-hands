<?php include 'conn.php'; ?>
<?php
if(isset($_SESSION['field'])){
  if($_SESSION['field']=="none"){
   exit(header('Location:/ngo/profile/f3.php'));
  }
  else{
      die(header('Location:/ngo/ngoprofile/ngoprofile.php'));
  }
 }
  //$_SESSION['error']='';
 $_SESSION['uname']='';
 $_SESSION['email']='';
 $_SESSION['fullname']='';
  $sql2="SELECT u.full_name,u.emailid,u.uname,p.field,p.message,p.mtime,p.title FROM userdata u,postfeed p WHERE p.uid=u.uid";
 $help=mysqli_query($conn,$sql2);
 $mid=mysqli_query($conn,$sql2);
 $right=mysqli_query($conn,$sql2);
?>


<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Sling">
 <link rel="stylesheet" type="text/css" href="bar.css">
</head> 
<body>
    <header>
         <div class="box">
            <ul>
               <div class="btn">
                 <a href="homepage.php"  style="float:left;font-size: 50px; color: #fff; margin-top: 10px"><span style="color:#0B3C5D">HELPING</span>  hands </a>
               <a class="Button" style="float:right;margin-right:10px;" href="/ngo/login/nindex.php">Login </a>
               <a class="Button" style="float:right; margin-right:10px;" href="/ngo/signup/signup1.php">Signup</a>
               </div>
            </ul>
         </div>
        </header> 
<div id="main" style="position:inline-flex;">
       <div class="left" > 
         <?php $i=0;?>
        <?php while($row=mysqli_fetch_assoc($help)): ?>
          <?php if($i%3==0): ?>
          <div class="field" style="position:relative;">
          <p style="color:#000; font-family: 'Verdana';"><?php echo $row['field']; ?></p>
          <div class="outerdiv1" style="margin-top:10px;">
               <h3  style="padding-left:10px;color:#32127A;font-family: Arial;"><?php echo $row['uname']; ?></h3>  
                <h3 style="padding-left:10px;color:#4c4c4c;font-family: Arial;"><?php echo $row['title']; ?></h3> 
              <div class="innerdiv" >
               <p style="font-family: 'Times New Roman'; color:#4c4c4c; padding-left: 10px; font-size:17px;style="overflow: auto;"><?php echo $row['message']; ?></p>
              </div>
        </div>
        </div>
        <?php endif;?>
        <?php $i++;?>
        <?php endwhile;?>
        
     </div>
      <div class="middle">

      <?php $i=0;?>

        <?php while($row=mysqli_fetch_assoc($mid)): ?>
          <?php if($i%3==1): ?>
      <div class="field">
      <p style="color:#000; font-family: 'Verdana';"><?php echo $row['field']; ?></p>
       <div class="outerdiv2">

            <h3 style="padding-left:10px;color:#32127A;font-family: Arial;"><?php echo $row['uname']; ?></h3>  
             <h3 style="padding-left:10px;color:#4c4c4c;font-family: Arial;"><?php echo $row['title']; ?></h3> 
              <div class="innerdiv" >
               <p style="font-family: 'Times New Roman';padding-left: 10px; color:#4c4c4c; font-size:17px;"><?php echo $row['message']; ?></p>
              </div>  
       </div>
       </div>
       <?php endif;?>
        <?php $i++;?>
        <?php endwhile;?>
        </div>
       <div class="right">
       <?php $i=0;?>

        <?php while($row=mysqli_fetch_assoc($right)): ?>
          <?php if($i%3==2): ?>
       <div class="field">
        <p style="color:#000; font-family: 'Verdana';"><?php echo $row['field']; ?></p>
        <div class="outerdiv3">
            <h3 style="padding-left:10px;color:#32127A;font-family: Arial;"><?php echo $row['uname']; ?></h3>   
            <h3 style="padding-left:10px;color:#4c4c4c;font-family: Arial;"><?php echo $row['title']; ?></h3> 
              <div class="innerdiv" >
               <p style="font-family: 'Times New Roman'; color:#4c4c4c; padding-left:10px;font-size:17px;"><?php echo $row['message']; ?></p>
              </div>  
         </div> 
         </div> 
         <?php endif;?>
        <?php $i++;?>
        <?php endwhile;?>
       </div>
       </div>

       <div style="margin-bottom:40px;">


       </div>
</body>
</html>