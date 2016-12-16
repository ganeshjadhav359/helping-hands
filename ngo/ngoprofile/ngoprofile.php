<?php include 'conn.php';?>
<?php
if(!isset($_SESSION['uid'])){
   exit(header('Location:/ngo/homepage/homepage.php'));
 }
 $uid=$_SESSION['uid'];
$field=$_SESSION['field'];
  $sql="SELECT * FROM userdata where uid='$uid' LIMIT 1";
  $result=mysqli_query($conn,$sql);
  $sql2="SELECT u.full_name,u.emailid,u.mobile,p.field,p.message,p.mtime,p.title FROM userdata u,postfeed p WHERE p.uid=u.uid AND p.field='$field'";
  $result2=mysqli_query($conn,$sql2);
  $row=mysqli_fetch_assoc($result); ?>
  <!DOCTYPE html>
  <html>
  <head>
  <title>NGO Profile</title>
    <link rel="stylesheet" type="text/css" href="f3.css">
  </head>
  <body>
  
  
        <header>
         <div class="box">
      
            <ul>
                
               <div class="btn">
               <a href="ngoprofile.php"  style="float:left;font-size: 40px;color: white; margin-top: 15px"><span class="name" >HELPING </span> hands </a>
              
               <a class="Button" style="float:right;margin-right: 20px;" href="/ngo/profile/logout.php">Logout </a>
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
               <!-- <div class="post"> 
                    <div class="fhalf">
                     <h3 style="padding:20px 0px 20px 0px;text-align:center;"> POST The QUERY</h3><br>
                    </div>
                    <div style="padding:10px">
										</div>
                    <div style="padding:20px;">
                    <a class="Button" href="javascript:show('post1')" style="margin:0px 0px 20px 50px ;text-align:center;">post</a>
                   </div>
                </div>-->
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

  

</div>

<script type="text/javascript">

function validate(){
  var flag=1;
   var form=document.forms.form;
   var title=form.title.value;
    if(title==null || title==""){
        user="please enter username";
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
        user="please enter username";
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
</script>
</body>
</html>