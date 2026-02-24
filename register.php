<?php include('connection.php');
include('header.php');
include('sidebar.php'); 

if (isset($_POST['submit']))
{
	
	$name= $_POST['name'];
	$email= $_POST['email'];
	$password= $_POST['password'];
	$mobile = $_POST['mobile'];
	$city= $_POST['city'];
	
	
	$xyz="insert into users (Name, Email, Password, mobile, city) values ('$name', '$email', '$password', '$mobile', '$city')";
	
	
	
	$sql= mysqli_query($con, $xyz);

	
	if ($sql) {
		
		echo "<script> alert (' Your data has been submitted', '".$name."')</script>";
		
		
	}
	
	else {
		
		 echo "not";
		
	}
	
	
}




?>
  

 

<div class="container">
	<div class="row">
		<div class="col-lg-12">
			



<form class="form-horizontal" method="post" enctype="multipart/form-data">

<fieldset style="margin:50px">

<!-- Form Name -->
<legend>Create an Account</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput"> Name</label>  
  <div class="col-md-4">
  <input name="name" type="text" placeholder="Enter your Name" class="form-control input-md" required="">
    
  </div>
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Email</label>  
  <div class="col-md-4">
  <input name="email" type="email" placeholder="Enter Email" class="form-control input-md" required="">
    
  </div>
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Password</label>  
  <div class="col-md-4">
  <input name="password" type="password" placeholder="Enter Password" class="form-control input-md" required>
    
  </div>
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Mobile Number</label>  
  <div class="col-md-4">
  <input name="mobile" type="number" placeholder="Enter Mobile Number" class="form-control input-md">
    
  </div>
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">City</label>  
  <div class="col-md-4">
  <input name="city" type="text" placeholder="Enter City Name" class="form-control input-md">
    
  </div>
</div>



<div class="form-group">
	<label class="col-md-4 control-label" for="textinput"></label>
	<div class="col-md-4">
		<center><input name="submit" type="submit" value="Register" class="btn btn-success btn-block">
			
		</center>
	</div>
</div>

<div class="form-group">
	<label class="col-md-4 control-label" for="textinput"></label>
	<div class="col-md-4">
		<center><a href="login.php"> Already have an account? Login here! </a>
			
		</center>
</div>
</div>

</fieldset>
</form>
	
		</div>
	</div>
</div>

<?php include('footer.php'); ?>


