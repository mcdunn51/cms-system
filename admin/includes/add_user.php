<?php 

if (isset($_POST['create_user']))
{
	$user_firstname = $_POST['user_firstname'];
	$user_role = $_POST['user_role'];
	
	//$post_image = $_FILES['post_image']['name'];
	//$post_image_temp = $_FILES['post_image']['tmp_name'];

	$username = $_POST['username'];
	$user_password = $_POST['user_password'];
	$user_email = $_POST['user_email'];
	
		// move_uploaded_file($post_image_temp, "../images/$post_image");

		$query = "INSERT INTO users(user_firstname, user_role, username, user_password, user_email) ";

		$query .= "VALUES ('{$user_firstname}','{$user_role}','{$username}', '{$user_password}','{$user_email}')";

		$createUserQuery = mysqli_query($conn, $query);

 }

?>


<form action="" method="post" enctype="multipart/form-data">


	<div class="form-group">
		<label for="title">Firstname</label>
		<input type="text" class="form-control" name="user_firstname"> 
	</div> 

	<div class="form-group">
		<label for="title">Lastname</label>
		<input type="text" class="form-control" name="user_lastname"> 
	</div> 

	<div class="form-group">
		<label for="title">Role</label><br>
		<select name="user_role">

			<option value="admin">Admin</option>
			<option value="subscriber" >Subscriber</option>
		
		</select>
	</div>

	<div class="form-group">
		<label for="title">username</label>
		<input type="text" class="form-control" name="username"> 
	</div> 

	<div class="form-group">
		<label for="title">password</label>
		<input type="password" class="form-control" name="user_password"> 
	</div>

	<div class="form-group">
		<label for="title">email</label>
		<input type="email" class="form-control" name="user_email"> 
	</div>

	<div class="form-group">
		<input class="btn btn-primary" type="submit" name="create_user" value="create user">
	</div>
</form>



