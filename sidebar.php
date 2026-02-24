    <?php
session_start();
error_reporting(0);
require('connection.php');

?>
 
 
 <style>

.menu
{
background-color: #00547E;
border-bottom: 4px solid #04A3ED;
width:100%;
height: auto;
padding: 0 10px;
margin: 0px;
z-index: 1;
opacity: 0.9;
}

.menu  .navbar-nav > .active > a
{
background-color : #04A3ED;
color: white;
font-weight: bold;
}

.menu  .navbar-nav >  li >  a
{
font-size: 13px;
color: white;


}
.menu  .navbar-nav >  li >  a:hover
{
background-color: #04A3ED;
}

.navbar-header > a
{
font-family: 'Ubuntu Condensed', sans-serif;
padding: 0px;
margin: 0px;
text-decoration: none;
color: white;
font-size: 25px;
padding: 5px 30px;
}
.navbar-header > a:hover
{
text-decoration: none;
color: #04A3ED;
}


</style>






<div class="menu">
    
	<div class="container">
	<div class="row">
	<div class="col-lg-12">
	
  
 
    <ul class="nav navbar-nav">
     
    
	<li class="active"><a href="index.php"> Home  
</a></li>

	</ul>
     <ul class="nav navbar-nav navbar-right">
	<?php

	
if (isset($_SESSION['name']))

{
	echo '
	
	<li><a href="add_exercise.php">Add Exercise</a></li>
    <li><a href="view_exercise.php">Mange Exercise</a></li>

    <li><a href="meals.php">Add Meal</a></li>
    <li><a href="view_meal.php">Manage Meal</a></li>



	
	<li><a href="add_record.php">Add Health Data</a></li>
	
	<li><a href="manage_record.php">Manage Health Data</a></li>
	<li><a href="add_reminders.php">Set Reminders</a></li>
    <li><a href="view_reminders.php">View Reminders</a></li>
 
	
        <li><a href="profile.php">Profile</a></li>
    
      
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span>Logout</a></li>


      </ul>
';
}
else {
	
	echo '


<ul class="nav navbar-nav navbar-right">

<li><a href="index.php">Home</a></li>
	
		 <li><a href="login.php"> User Login</a></li>

		 
		  <li><a href="register.php">Register</a></li>
		   <li><a href="admin/login.php">Admin Login</a></li> </ul>';
}

?>

</ul>


  </div>
</nav>
</div>
</div>
</div>
</div>
