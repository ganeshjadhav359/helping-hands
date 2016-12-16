<?php session_start();
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
      <span><input type="text" name="uname" placeholder="Username" value='<?php echo $_SESSION['uname']; $_SESSION['uname']=''?>'>
       </p></span>                                                                                         
        <input type="password" name="password"  placeholder="Password">
        <p style="font-size:14px;color:red;padding-top:10px;"><?php  echo $_SESSION['error'];
               $_SESSION['error']='';        
        ;?></p>
      <button>Login</button>
    </form>
  </div>
  <div class="cta"><a href="/ngo/signup/signup1.php">Dont have an account?</a></div>
</div>  
    
  </body>
</html>
