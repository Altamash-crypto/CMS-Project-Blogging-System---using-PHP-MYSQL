<?php 

	if (isset($_POST['submit'])) {
		//GRAB THE CODE FROM THE FORM
		$post_title = $_POST['post_title'];
		$post_category_id = $_POST['post_category_id'];
		$post_author = $_POST['post_author'];
		$post_status = $_POST['post_status'];

		$post_image = $_FILES['post_image']['name'];
		$post_image_tmp = $_FILES['post_image'] ['tmp_name'];


		$post_tags = $_POST['post_tags'];
		$post_content = $_POST['post_content'];
		$post_date = date('d-m-y');

		move_uploaded_file($post_image_tmp, '../img/' .$post_image );

		$query = "INSERT into posts(post_title, post_category_id, post_author, post_status, post_image, post_tags, post_content, post_date) VALUES " . "('{$post_title}', '{$post_category_id}', '{$post_author}', '{$post_status}', '{$post_image}', '{$post_tags}', '{$post_content}', now())";

		$post_in_query = mysqli_query($connection, $query);
		if (!$post_in_query) {
			echo 'Query Failed ' . mysqli_error($connection);
		}

		$the_post_id = mysqli_insert_id($connection);

		echo "<p class='bg-success'>Post Added: " . " " . "<a href='../post.php?p_id={$the_post_id}'>View Posts</a> or <a href='posts.php?source=add_post'>Add Post</a></p>";

	}

?>



<form action="" method="post" enctype="multipart/form-data">

	<div class="form-group">
		<label for="title">Post Title</label>
		<input type="text" class="form-control" name="post_title">
	</div>
	<div class="form-group">
		<label for="post_category">Post Category</label> <br>
		<select name="post_category_id" id="">
			<?php 

			$query = "SELECT * FROM categories";
			$slct_cat = mysqli_query($connection, $query);

			while ($row = mysqli_fetch_assoc($slct_cat)) {
				$cat_id = $row['cat_id'];
				$cat_title = $row['cat_title'];

				echo "<option value=''>$cat_title</option>";
			}


			?>

		</select>
	</div>

	<div class="form-group">
		<label for="author">Post Author</label>
		<input type="text" class="form-control" name="post_author">
	</div>

	<div class="form-group">
		<label for="status">Post Status</label>
		<select name="post_status" class="form-control">
			<option value="draft">Select Option</option>
			<option value="published">Publish</option>
			<option value="darft">Darft</option>
		</select>
	</div>

	<div class="form-group">
		<label for="post_image">Post Image</label>
		<input type="file" class="form-control" name="post_image">
	</div>

	<div class="form-group">
		<label for="post_tags">Post Tags</label>
		<input type="text" class="form-control" name="post_tags">
	</div>

	<div class="form-group">
		<label for="post_content">Post Content</label>
		<textarea name="post_content" class="form-control" id="editor" cols="30" rows="10"></textarea>
	</div>

	<div class="form-group">
		<input class="btn btn-primary" type="submit" value="Publish Post" name="submit">
	</div>

	
</form>