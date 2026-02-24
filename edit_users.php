<!DOCTYPE html>
<?php 


include('header.php');
include('sidebar.php');


 ?>


 <div id="content">
          <header>

<div class="row" style="margin: 50px">
 <div class="col-md-12">
				
	
	<?php
	
		if(isset($_GET['update']))
		  {
				$edit_id = $_GET['update'];	
					
			$qry = "select * from users where UserID='$edit_id' ";
			$run = mysqli_query($con, $qry);
			if(!$run)
			{
				echo "<script> alert('query not executed') </script>";
			}
			
			while($row=mysqli_fetch_array($run))
			{
										
					$id 		= $row ['UserID'];
					$name 		= $row ['Name'];
					$email 		= $row ['Email'];
					$password 	= $row ['Password'];
					$mobile 	= $row ['mobile'];
					$city 		= $row ['city'];
				
				
				
			}
		  }
		?>



		  <div class="content-inner">
            <div class="form-wrapper">
			
							<form  method="post" width="85%" enctype="multipart/form-data" align="center">
					<table align="center" width="450" height="500">
						<tr>
							<td colspan="2" align="center"> <h1 style="font-family:arial;">Edit Record </h1></td>
							
						</tr>
						
						<tr>
							<td>Name</td>
							<td>	<input type="text" class="form_item" name="name" value="<?php echo $name; ?>" required> </td>						 
						</tr>
						
						<tr>
							<td >Email </td>
							<td>	<input type="text" class="form_item" name="email" value="<?php echo $email; ?>" required> </td>	
						</tr>

						<tr>
							<td >Password </td>
							<td>	<input type="text" class="form_item" name="password" value="<?php echo $password; ?>" required> </td>	
						</tr>
					
						
						<tr>
							<td> Mobile </td>
							<td>	<input type="text" class="form_item" name="mobile" value="<?php echo $mobile; ?>" required> </td>	
						</tr>


						<tr>
							<td >City </td>
							<td>	<input type="text" class="form_item" name="city" value="<?php echo $city; ?>" required> </td>	
						</tr>


					 <tr> 
						<td colspan="2" align="right"> <input class="sub"  type="submit" name="register" value="Update"> </td>
					 </tr>
					
					</table>
						
					</form>
	
		</div>
			</div>
		</div>	
		
	
	
	</body>

</html>				
					
					
					
<?php 
		if(isset($_POST['register']))
		{
			
			
			$name  	 = $_POST['name'];
			$email 	 = $_POST['email'];
			$password= $_POST['password'];
			$mobile  = $_POST['mobile'];
			$city 	 = $_POST['city'];
			
			
	$qry = "update users set Name = '$name', Email='$email', Password='$password', mobile='$mobile', city='$city' where UserID = '$edit_id'" ;
												
					$run = mysqli_query($con, $qry);
					
					
					
					if($run)
					{
						
						echo "<script>alert('Record updated successfully')</script>";
						echo "<script>window.open('profile.php', '_self')</script>";
							
						
					}
					else
					{
						
						echo"<script>alert('Oooops!  Something went wrong, Please try again') </script>";
						
					}
				
		}
?>
		
	</div>
	</div>
	</div>

<?php include 'footer.php'; ?>