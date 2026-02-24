<?php

include('connection.php');
include('header.php');
include('sidebar.php');


$insert = "select * from users where Name='".$_SESSION['name']."'";	

$sql = mysqli_query ($con, $insert);

while ($rows= mysqli_fetch_array($sql)) {
  
  $id = $rows ['UserID'];
  $name = $rows ['Name'];
  $email = $rows ['Email'];
  $password = $rows ['Password'];
  $mobile = $rows ['Mobile'];
  $city = $rows ['city'];
  $date = $rows ['date'];
}

?>

 
<div class="container" style="margin-top: 50px">
  <div class="row">
        
       <div class="col-md-7">

<div class="panel panel-default">
  <div class="panel-heading">  <h4 >User Profile</h4></div>
   <div class="panel-body">
       
    <div class="box box-info">
        
            <div class="box-body">
                     <div class="col-sm-6">
                     <div  align="center"> <img alt="User Pic" src="images/dp.jpeg" id="profile-image1" class="img-circle img-responsive"> 
                
              
                <!--Upload Image Js And Css-->
           
              
   
                
                
                     
                     
                     </div>
              
              <br>
    
              <!-- /input-group -->
            </div>
        
            <div class="clearfix"></div>
            <hr style="margin:5px 0 5px 0;">
    
              
<div class="col-sm-5 col-xs-6 tital " >Full Name:</div><div class="col-sm-7 col-xs-6 "><?php echo $name; ?></div>
     <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital">Email:</div><div class="col-sm-7"><?php echo $email; ?></div>
  <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >Password:</div><div class="col-sm-7"><?php echo $password; ?></div>
  <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >City:</div><div class="col-sm-7"><?php echo $city; ?></div>

  <div class="clearfix"></div>
<div class="bot-border"></div>


<div class="col-sm-5 col-xs-6 tital " >Update Profile:</div><div class="col-sm-7"><a href="edit_users.php?update=<?php echo $id; ?>" class="btn btn-warning">Update</a></div>

  <div class="clearfix"></div>
<div class="bot-border"></div>

            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
       
            
    </div> 
    </div>
</div>  
    <script>
              $(function() {
    $('#profile-image1').on('click', function() {
        $('#profile-image-upload').click();
    });
});       
              </script> 
       
       
       
       
       
       
       
       
       
   </div>
</div>



    <?php include_once "footer.php"; ?>