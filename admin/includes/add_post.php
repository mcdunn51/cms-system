<?php 

if (isset($_POST['create_post']))
{
	$post_category_id = $_POST['post_category'];
	$post_title = $_POST['post_title'];
	$post_author = $_POST['post_author'];
	$post_date = date('d-m-Y');
	
	$post_image = $_FILES['post_image']['name'];
	$post_image_temp = $_FILES['post_image']['tmp_name'];

	$post_tags = $_POST['post_tags'];
	$post_content = $_POST['post_content'];
	$post_status = $_POST['post_status'];

		move_uploaded_file($post_image_temp, "../images/$post_image");

		$query = "INSERT INTO posts(post_category_id, post_title, post_tags, post_author, post_date, post_image, post_content, post_status) ";

		$query .= "VALUES ({$post_category_id},'{$post_title}', '{$post_tags}', '{$post_author}',now(),'{$post_image}','{$post_content}','{$post_status}')";

		$addPostQuery = mysqli_query($conn, $query);

}

?>


<form action="" method="post" enctype="multipart/form-data">


	<div class="form-group">
		<label for="title">Title</label>
		<input type="text" class="form-control" name="post_title"> 
	</div> 

	<div class="form-group">

		<label for="title">Select Category Title</label>
		<br>
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
		<input type="text" class="form-control" name="post_author"> 
	</div> 

	<div class="form-group">
		<label for="post_image">Image</label>
		<input type="file" name="post_image"> 
	</div> 
	
	<div class="form-group">
		<label for="title">Tags</label>
		<input type="text" class="form-control" name="post_tags"> 
	</div> 

	<div class="form-group">
		<label for="title">Content</label>
		<textarea class="form-control" rows="5" name="post_content"></textarea>
	</div> 

	<div class="form-group">
		<select name="post_status">
			<option value="Select Post Status">Select Post Status</option>
			<option value="Finished">Finished</option>
			<option value="Draft">Draft</option>
		</select>
	</div> 

	<div class="form-group">
		<input class="btn btn-primary" type="submit" name="create_post" value="create post">
	</div>
</form>



