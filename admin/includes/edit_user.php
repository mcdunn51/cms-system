<?php 

if(isset($_GET['edit_user']))
{
	$the_user_id = ($_GET['edit_user']);

$query = "SELECT * FROM users WHERE user_id = $the_user_id";
$select_users_query = mysqli_query($conn, $query);

while ($row=mysqli_fetch_assoc($select_users_query)) 
{

$user_password = $row['user_password'];
$user_firstname = $row['user_firstname'];
$user_lastname = $row['user_lastname'];
$user_email = $row['user_email'];
$user_role = $row['user_role'];
$username = $row['username'];

}

}

if (isset($_POST['update_user']))

{	

$user_password = $_POST['user_password'];
$user_firstname = $_POST['user_firstname'];
$user_lastname = $_POST['user_lastname'];
$user_email = $_POST['user_email'];
$user_role = $_POST['user_role'];
$username = $_POST['username'];
	

$query = "UPDATE users SET ";
$query .="user_password ='{$user_password}', ";
$query .="user_firstname ='{$user_firstname}', ";
$query .="user_lastname ='{$user_lastname}', ";
$query .="user_email ='{$user_email}', ";
$query .="user_role ='{$user_role}', ";
$query .="username ='{$username}' ";
$query .="WHERE user_id ={$the_user_id}";

$update_user_query = mysqli_query($conn, $query);

	
}

?>


<form action="" method="post" enctype="multipart/form-data">


	<div class="form-group">
		<label for="title">Firstname</label>
		<input type="text" class="form-control" name="user_firstname" value="<?php echo $user_firstname ?>"> 
	</div> 

	<div class="form-group">
		<label for="title">Lastname</label>
		<input type="text" class="form-control" name="user_lastname" value="<?php echo $user_lastname ?>"> 
	</div> 

	<div class="form-group">
		<select name="user_role">

			<option value="admin">Select Option</option>
			<option value="admin">Admin</option>
			<option value="subscriber" >Subscriber</option>
		
		</select>
	</div>

	<div class="form-group">
		<label for="title">username</label>
		<input type="text" class="form-control" name="username" value="<?php echo $username ?>">
	</div> 

	<div class="form-group">
		<label for="title">password</label>
		<input type="password" class="form-control" name="user_password" value="<?php echo $user_password ?>"> 
	</div>

	<div class="form-group">
		<label for="title">email</label>
		<input type="email" class="form-control" name="user_email" value="<?php echo $user_email?>"> 
	</div>

	<div class="form-group">
		<input class="btn btn-primary" type="submit" name="update_user" value="update user">
	</div>
</form>



