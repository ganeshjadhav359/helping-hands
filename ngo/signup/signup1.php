<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="signup.css">
</head>
   <body onload="form.reset();">
	<div class="container">
	   <div id="grad">
	        <ul>
		  <li style=""><a href="/ngo/homepage/homepage.php">Helping Hands</a></li>
		  <li style="float:right"><a class="active" href="/ngo/login/nindex.php"> Have an account? Log in</a></li>
		</ul>
	   </div>	
	   <form name=form action="inputs.php" onsubmit="return validate()" autocomplete=on method="post"> 	
		<div class="outsidebox" >
		  <div class='login'>
			  <h2>Register</h2>
			  <div class="agree1">
			     <label style="margin-left: 30px;"> <input id="ngo" type="radio" name="option" value="ngo">NGO</label>
                 <label style="margin-left:30px;"><input id="ind" type="radio" name="option" value="ind">INDIVIDUAL</label>
                  <p id="rad" style="font-size: 12px;color:red;"></p>
			  </div>
			 <span><input name='uname' placeholder='Username' type='text' value='<?php if(isset($_SESSION['name'])){echo $_SESSION['name'];}?>'>
                <?php $_SESSION['name']='';?>
               <p id="username" style="font-size: 12px;color:red;"></p>
               <p style="font-size: 12px;color:red;"><?php if(isset($_SESSION['uerr'])){echo $_SESSION['uerr'];}$_SESSION['uerr']='';?></p>
               <!-- <p id="username" style="font-size: 12px;color:red;"></p> -->
			 </span>
			 <span><input name='email' placeholder='E-Mail Address' type='text' value='<?php if(isset($_SESSION['email'])){echo $_SESSION['email'];}?>'>
       <?php $_SESSION['email']='';?>
       <p style="font-size: 12px;color:red;"><?php if(isset($_SESSION['emailerr'])){echo $_SESSION['emailerr'];}?></p>
       <?php $_SESSION['emailerr']='';?>
			   <p id="email" style="font-size: 12px;color:red;"></p></span>
			 <span> <input name='password' placeholder='Password' type='password'>
			  <p id="password" style="font-size: 12px;color:red;"></p></span>
			  <span><input name='passwordcon' placeholder=' Confirm Password' type='password'>
			   <p id="passwordcon" style="font-size: 12px;color:red;"></p></span>
			  <span><input name='fullname' placeholder='Enter Your Full Name ' type='text' value='<?php echo $_SESSION['fullname']; $_SESSION['fullname']='';?>'>
			   <p id="fullname" style="font-size: 12px;color:red;"></p></span>
         <span><input name='number' placeholder='Enter Your Mobile Number ' type='text' alue='<?php echo $_SESSION['number']; $_SESSION['number']='';?>'></span>
         <p id="number" style="font-size: 12px;color:red;"></p>
         <div id="disp">
			  <div id="a1">
			        <strong>PLEASE SELECT FIELDS</strong><br>
			        <div class="fields">
			         <select name="field">
			         	   <?php if(isset($_SESSION['field'])):?>
                       <option <?php if($_SESSION['field']=='select'){ ?> selected="true" <?php };?> value="select">Please select your feild</option>
                        <option <?php if($_SESSION['field']=='Child Welfare'){ ?> selected="true" <?php };?> value="Child Welfare">Child Welfare</option>
                        <option <?php if($_SESSION['field']=='Child Education'){ ?> selected="true" <?php };?>  value="Child Education">Child Education</option>
                        <option <?php if($_SESSION['field']=='Disaster Management and relief'){ ?> selected="true" <?php };?>  value="Disaster Management and relief">Disaster Management and relief</option>
                        <option <?php if($_SESSION['field']=='Environment'){ ?> selected="true" <?php };?>  value="Environment">Environment</option>
                        <option <?php if($_SESSION['field']=='Animals'){ ?> selected="true" <?php };?> value="Animals">Animals</option>
                        <!-- <option <?php if($_SESSION['field']=='Volunteer'){ ?> selected="true" <?php };?> value="Volunteer">Volunteer</option> -->
                        <?php $_SESSION['field']='select';?>
                 <?php endif ;?> 
                 <?php if(!isset($_SESSION['field'])):?>
                        <option value="select">Please Select Field</option>
                        <option value="Child Welfare">Child Welfare</option>
                        <option value="Child Education">Child Education</option>
                        <option value="Disaster Management and relief">Disaster Management and relief</option>
                        <option  value="Environment">Environment</option>
                        <option  value="Animals">Animals</option>
                        <!-- <option  value="Volunteer">Volunteer</option> -->
                  <?php endif ;?> 
			         </select>
               <p id="error" style="font-size: 12px;color:red;"></p>
			      	</div>
                 </div>
                </div>
			  <input class='animated' type='submit' value='Register'>
			  <a class='forgot' href='/ngo/login/nindex.php'>Already have an account?</a>
			

		</div>         
        </div>
        </form>
        </div>
  
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $("#ngo").click(function(){
        $("#a1").show();
    });
    $("#ind").click(function(){
        $("#a1").hide();
    });
});
</script>

<script language="javascript">
function validate(){
  var flag=1;
   var form=document.forms.form;
   var user=form.uname.value;
 
       if(user==null || user==""){
       	user="please enter username";
       	document.getElementById("username").innerHTML=user;
       	flag=0;
       }
       else{
       		document.getElementById("username").innerHTML="";
       }
      var email=form.email.value; 
     if(email==null ||email==""){
     	email="please enter email";
     	document.getElementById("email").innerHTML=email;

     	flag=0;
     }
      else{
       		document.getElementById("email").innerHTML="";
       }
     var password=form.password.value;
     if(password==null || password==""){
            password="please enter password";
            document.getElementById("password").innerHTML=password;
            flag=0;
     }
      else{
       		document.getElementById("password").innerHTML="";
       }


     var passwordcon=form.passwordcon.value;
     if(passwordcon==null || passwordcon==""){
     	passwordcon="please conform password";
     	document.getElementById("passwordcon").innerHTML=passwordcon;
     	flag=0;
     }
        else{
       		document.getElementById("passwordcon").innerHTML="";
            }
     if(passwordcon!=password){
     	passwordcon =" pasword confirmation fail";
     	document.getElementById("passwordcon").innerHTML=passwordcon;
     	flag=0;
     }
      else{
       		document.getElementById("passwordcon").innerHTML="";
       }
     var fullname=form.fullname.value;
     if (fullname==null || fullname=="") {
     	fullname="Enter full name";
     	document.getElementById("fullname").innerHTML=fullname;
     	flag=0;
     }
      else{
       		document.getElementById("fullname").innerHTML="";
       }
  
     var number=form.number.value;
       var mob=/^[1-9]{1}[0-9]{9}$/;
       if(number=="" || number==null)
       {
         number="Enter phone number";
      document.getElementById("number").innerHTML=number;
      flag=0;
       }
       else if(mob.test(number)==false)
       {
        number="invalid number";
      document.getElementById("number").innerHTML=number;
      flag=0;
       }
       else{
          document.getElementById("number").innerHTML="";
       }
       var radio=form.option.value;
        var opt=form.field.value;
        var f=0;
       if(radio!="ind" && radio!="ngo"){
       //	alert("hi");
       	 	   radio="please select field";
      document.getElementById("rad").innerHTML=radio;
         f=0;
         flag=0;
       }
        else{
          document.getElementById("rad").innerHTML="";
       }
         if(opt=="select" && radio=="ngo"){
       	 	   radio="please select field";
          document.getElementById("error").innerHTML=radio;
         flag=0;
       }
         else{
          document.getElementById("error").innerHTML="";
       }
     if(flag==0){
     	return false;
     }
     else{
     	return true;
     }
}

 function show(id){
  document.getElementById(id).style.display='block'
 }
</script>
 </body>
</html>
