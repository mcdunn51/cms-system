<?php 



if (isset($_GET['p_id']))
{

	$the_post_id = $_GET['p_id'];

}

	$query = "SELECT * FROM posts WHERE post_id = $the_post_id";
	$selectPostById = mysqli_query($conn, $query);

	while ($row=mysqli_fetch_assoc($selectPostById)) 
	{

		$post_id = $row['post_id'];
		$post_category_id = $row['post_category_id'];
		$post_title = $row['post_title'];
		$post_author = $row['post_author'];
		$post_tags = $row['post_tags'];
		$post_date = $row['post_date'];
		$post_image = $row['post_image'];
		$post_content = $row['post_content'];
		$post_comment_count = $row['post_comment_count'];
		$post_status = $row['post_status'];
	}




if (isset($_POST['edit_post']))

{
	$post_title = $_POST['post_title'];
	$post_author = $_POST['post_author'];
	$post_category_id = $_POST['post_category'];

	$post_image = $_FILES['post_image']['name'];
	$post_image_temp = $_FILES['post_image']['tmp_name'];

	$post_tags = $_POST['post_tags'];
	$post_content = $_POST['post_content'];
	$post_status = $_POST['post_status'];

	move_uploaded_file($post_image_temp, "../images/$post_image");

	if(empty($post_image))
	{

		$query = "SELECT * FROM posts WHERE post_id = $the_post_id ";
		$select_image = mysqli_query($conn, $query);

		while($row=mysqli_fetch_array($select_image))

		{
			$post_image = $row['post_image'];
		}


	}


	$query = "UPDATE posts SET ";
	$query .="post_category_id = '{$post_category_id}', ";
	$query .="post_title ='{$post_title}', ";
	$query .="post_author ='{$post_author}', ";
	$query .="post_date = now(), ";
	$query .="post_image ='{$post_image}', ";

	$query .="post_tags ='{$post_tags}', ";

	$query .="post_content ='{$post_content}', ";
	$query .="post_status ='{$post_status}' ";
	$query .="WHERE post_id ={$the_post_id}";

	$update_post = mysqli_query($conn, $query);

	
}

?>

<form action="" method="post" enctype="multipart/form-data">


	<div class="form-group">
		<label for="title">Post Title</label>
		<input type="text" value="<?php echo $post_title; ?>" class="form-control" name="post_title"> 
	</div> 

	<div class="form-group">
		
		<select name="post_category">
			
			<?php 
			$query = "SELECT * FROM categories";

			$select_categories_id = mysqli_query($conn, $query);

			while ($row = mysqli_fetch_assoc($select_categories_id))
			{ 

				$cat_id = $row['cat_id'];
				$cat_title = $row['cat_title'];

				echo "<option value='$cat_id'>{$cat_title}</option>";

				}
			?>



		</select>
	</div> 

	<div class="form-group">
		<label for="title">Author</label>
		<input type="text" value="<?php echo $post_author; ?>" class="form-control" name="post_author"> 
	</div> 

	<div class="form-group">
		<label>Select Image</label>
		<br>
		<img src="../images/<?php echo $post_image;?>" width='100' height='100'>
		<input type="file" name="post_image"> 
	</div> 

	<div class="form-group">
		<label for="title">Tags</label>
		<input type="text" value="<?php echo $post_tags; ?>" class="form-control" name="post_tags"> 
	</div>

	<div class="form-group">
		<label for="title">Content</label>
		<input type="text" value="<?php echo $post_content; ?>" class="form-control" name="post_content"> 
	</div> 

	<div class="form-group">
		<select name="post_status">
			<option value="Select Post Status">Select Post Status</option>
			<option value="Finished">Finished</option>
			<option value="Draft">Draft</option>
		</select>
	</div> 

	<div class="form-group">
		<input class="btn btn-primary" type="submit" name="edit_post" value="edit post">
	</div>
</form>