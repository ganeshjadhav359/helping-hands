<?php session_start();
 
if(isset($_SESSION['field'])){
  if($_SESSION['field']=="none"){
   exit(header('Location:/ngo/profile/f3.php'));
  }
  else{
      die(header('Location:/ngo/ngoprofile/ngoprofile.php'));
  }
 }

 ?>
<!DOCTYPE html>
<html > 
  <head>
    <meta charset="UTF-8">
    <title>Login</title>
    
    
    <link rel="stylesheet" href="css/reset.css">
        <link rel="stylesheet" href="css/style.css">

    
    
    
    
  </head>

  <body>

    
<div class="pen-title">
</div>
<div class="module form-module">
  <div class="toggle">
    
  </div>
  <div class="form">
    <h2>Login to your account</h2>
    <form action="inputl.php" method="post">
      <span><input type="text" name="uname" placeholder="Username" value='<?php if(isset($_SESSION['uname'])){ echo $_SESSION['uname'];}?>'>
       </p></span> 
          <?php    $_SESSION['uname']='';        
        ;?>                                                                                        
        <input type="password" name="password"  placeholder="Password">
        <p style="font-size:14px;color:red;padding-top:10px;"><?php if(isset($_SESSION['error'])){ echo $_SESSION['error'];}?></p>
           <?php    $_SESSION['error']='';        
        ;?>
      <button>Login</button>
    </form>
  </div>
  <div class="cta"><a href="/ngo/signup/signup1.php">Dont have an account?</a></div>
</div>  
    
  </body>
</html>
