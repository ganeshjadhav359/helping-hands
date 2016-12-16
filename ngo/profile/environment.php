<?php include 'conn.php';?>
<?php
if(!isset($_SESSION['uid'])){
   exit(header('Location:/ngo/homepage/homepage.php'));
 }
// $_SESSION['uid']=1;
  $uid=$_SESSION['uid'];
  $sql="SELECT * FROM userdata where uid='$uid' LIMIT 1";
  $result=mysqli_query($conn,$sql);
  $sql2="SELECT u.full_name,u.emailid,u.mobile,p.field,p.message,p.mtime,p.title FROM userdata u,postfeed p WHERE p.uid=u.uid AND p.field ='Environment'";
  $result2=mysqli_query($conn,$sql2);
  $row=mysqli_fetch_assoc($result); ?>
  <!DOCTYPE html>
  <html>
  <head>
    <link rel="stylesheet" type="text/css" href="f3.css">
  </head>
  <body>
  
  
        <header>
         <div class="box">
      
            <ul>
                
               <div class="btn">
               <a href="f3.php"  style="float:left;font-size: 40px;color: white; margin-top: 15px"><span class="name" >HELPING </span> hands </a>
               <a class="Button" href="f3.php" style="float:right;"  >Home</a>
               <a class="Button" style="float:right;margin-right: 20px;" href="logout.php">Logout </a>
               </div>
            </ul>
         </div>
        </header>	
    <div class="container">
            <div class="left_col">
                <div class=profile style="height:auto;">
                  <div class="fhalf">
                  </div>
                  <div style="background-color:white;text-align:center;padding-top:15px; padding-bottom:20px;">
                  <p>
                  <h3><?php echo $row['full_name']; ?></h3>
                    <h4 style="color: blue;"><?php echo $row['emailid']; ?></h4><br>
                  </div>
                </div>
                <div class="post">
                    <div class="fhalf">
                     <h3 style="padding:20px 0px 20px 0px;text-align:center;"> POST The QUERY</h3><br>
                    </div>
                    <div style="padding:10px">
										</div>
                    <div style="padding:20px;">
                    <a class="Button" href="javascript:show('post1')" style="margin:0px 0px 20px 50px ;text-align:center;">post</a>
                   </div>
                </div>
            </div> 
            <div class="middle">
           <?php while($row=mysqli_fetch_assoc($result2)): ?> 
                <p style="padding:10px 0px;"><?php echo $row['field']; ?></p>
                <div class="profile1">
                  <div class="header">
                     <div class="fullname">
                       <p><?php echo $row['full_name']; ?></p>
                     </div>
                     <div class="email">
                          <?php echo $row['emailid']; ?>
                     </div>
                  </div>
                  <div class="message">
                    <div class="min">
                       <div class="tit">
                          <p style="color:#4B0082; font-size:30px;"><?php echo $row['title']; ?>
                       </div>
                       <div class="con">
                       <?php 
                           $time=strtotime($row['mtime']);
                           $date=date("j F Y g:i A ",$time);
                       ?>
                         <p> <span style="color:green;font-size:18px"><?php echo $date; ?></span>
                         <?php echo $row['message']; ?>
                         <!-- Missing <html> tags added, <footer> brought inside <body> tag. While not directly related to your question, it would also appear you are using <br> tags to make space between various elements. I would suggest you stop doing that, and use CSS to adjust the margin properties of those elements insteadMissing <html> tags added, <footer> brought inside <body> tag. While not directly related to your question, it would also appear you are using <br> tags to make space between various elements. I would suggest you stop doing that, and use CSS to adjust the margin properties of those elements insteadMissing <html> tags added, <footer> brought inside <body> tag. While not directly related to your question, it would also appear you are using <br> tags to make space between various elements. I would suggest you stop doing that, and use CSS to adjust the margin properties of those elements instead</p> -->
                       </div>

                      </div>
                    
                  </div>
                  <div class="info">
                    <p style="padding:10px 0px 0px 10px;margin-bottom:20px;">Contact No.<?php echo $row['mobile']; ?></p>
                  </div>
                </div>
                  <?php endwhile;?>           
            </div>
            <div class="right_col">
           
              <div class="profile" style="min-height: 200px; width:80%;">
              <div class="box">
                <ul>
                   
                     <a class="rButton" href="childwelfare.php" style="float:left;"  >Child Welfare</a>
                     <a class="rButton" style="float:left" href="childeducation.php">Child Education</a>
                      <a class="rButton" style="float:left" href="disaster.php">Disaster Management and relief</a>
                       <a class="rButton" style="float:left" href="environment.php">Environment</a>
                       <a class="rButton" style="float:left;border-bottom:1px solid #b18cd9;" href="animal.php">Animals</a>
                       <!-- <a class="rButton" style="float:left ;border-bottom:1px solid #b18cd9;" href="#">Volunteer</a> -->
                     
                     
               </ul>
           </div>
       </div>
    </div>
             


</div>
<div id="post1" class="post1">
<div class="outp" style="float:left;">
  <form name=form  action="message.php" onsubmit="return validate()" method="post">  
  <div class="top">
      <div style="color:#fff;padding-left:5px;">Insert Query
      <div class="img">
        <a href="javascript:showhide('post1')">
           <img src="x.png" alt="c" style="width:20px;height:20px;">
        </a>

      </div>
      </div>
  </div>
  <div class="title">
      <div class="titin">
        <p id="title"  style="padding-bottom:5px;color:red;font-size:14px;"  ></p>
         <input style="border:white;font-size:15px;width:410px;" type="text" name="title" placeholder="Title">
         
      </div>
  </div>
 
   <div class="drop">
     <div class="dropin" style="float:left">
         <select name="opt">  
            <option value="volvo">Please Select Field</option>
            <option value="child">Child Welfare</option>
                        <option value="Child Education">Child Education</option>
                        <option value="Disaster Management and relief">Disaster Management and relief</option>
                        <option  value="Environment">Environment</option>
                        <option  value="Animals">Animals</option>
                        <option  value="Volunteer">Volunteer</option>
         </select>
         <p id="opt" style="float:right;margin-left:30px;color:red;font-size:14px;"></p>
      </div>
   </div>
  
   <div class="text">
        <p id="tarea" style="color:red;font-size:14px"></p>
       <textarea name="tarea"  style="width: 100%; height:250px; border: 0px none;" placeholder="Write your message here"></textarea>
  </div>
  
   <div class="send">
        <input class='tButton' type='submit' value='Post' >
   </div>
  
  </form> 

   </div>
 </div>
</div>



<script type="text/javascript">

function validate(){
  var flag=1;
   var form=document.forms.form;
   var title=form.title.value;
    if(title==null || title==""){
        user="please enter title";
        document.getElementById("title").innerHTML=user;
        flag=0;
       }
       else{
          document.getElementById("title").innerHTML="";
       }
      var opt=form.opt.value; 
     if(opt=="volvo"){
      email="please select field";
      document.getElementById("opt").innerHTML=email;

      flag=0;
     }
      else{
          document.getElementById("opt").innerHTML="";
       }
      var tarea=form.tarea.value;
      if(tarea==null || tarea==""){
        user="please enter details";
        document.getElementById("tarea").innerHTML=user;
        flag=0;
       }
       else{
          document.getElementById("tarea").innerHTML="";
       }
       if(flag==0){
        document.getElementById('post1').style.display='block'
      return false;
     }
     else{
      return true;
     }

    }

 function showhide(id) {
    var e = document.getElementById(id);
    e.style.display ='none';
    document.getElementById("title").innerHTML="";
     document.getElementById("tarea").innerHTML="";
      document.getElementById("opt").innerHTML="";
 }
 function show(id){
  document.getElementById(id).style.display='block'
 }
</script>
</body>
</html>