
<?php 

	if (isset($_GET['p_id'])) {
		$post_id = $_GET['p_id'];

		$query = "SELECT * FROM posts WHERE post_id = $post_id";
    $all_posts = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($all_posts)) {
        $post_id = $row['post_id'];
        $post_title = $row['post_title'];
        $post_author = $row['post_author'];
        $post_category_id = $row['post_category_id'];
        $post_date = $row['post_date'];
        $post_image = $row['post_image'];
        $post_content = $row['post_content'];
        $post_tags = $row['post_tags'];
        $post_comment_count = $row['post_comment_count'];
        $post_status = $row['post_status'];
	}
}



//CHECK TO SEE IF IS SET
	if (isset($_POST['update_post'])) {
		//GRAB THE CODE FROM THE FORM
		$post_title = $_POST['post_title'];
		$post_category_id = $_POST['post_cat'];
		$post_author = $_POST['post_author'];
		$post_status = $_POST['post_status'];

		$post_image = $_FILES['post_image']['name'];
		$post_image_tmp = $_FILES['post_image'] ['tmp_name'];


		$post_tags = $_POST['post_tags'];
		$post_content = $_POST['post_content'];
		$post_date = date('d-m-y');

		move_uploaded_file($post_image_tmp, '../img/' .$post_image );

		if (empty($post_image)) {
			$query = "SELECET * FROM posts WHERE post_id = $post_id";
			$slct_img = mysqli_query($connection, $query);

			while ($row = mysqli_fetch_assoc($slct_img)) {
				$post_image = $row['post_image'];
			}
		}

		$query = "UPDATE posts SET ";
          $query .="post_title  = '{$post_title}', ";
          $query .="post_category_id = '{$post_category_id}', ";
          $query .="post_date   =  now(), ";
          $query .="post_author = '{$post_author}', ";
          $query .="post_status = '{$post_status}', ";
          $query .="post_tags   = '{$post_tags}', ";
          $query .="post_content= '{$post_content}', ";
          $query .="post_image  = '{$post_image}' ";
          $query .= "WHERE post_id = {$post_id} ";

		$updt_post = mysqli_query($connection, $query);

		echo "<p class='bg-success'>Post Updated: " . " " . "<a href='posts.php'>View Posts</a></p>";


	}



?>



<form action="" method="post" enctype="multipart/form-data">

	<div class="form-group">
		<label for="title">Post Title</label>
		<input type="text" class="form-control" name="post_title" value="<?php echo $post_title; ?>">
	</div>
	<div class="form-group">
		<label for="post_category">Post Category</label> <br>
		<select name="post_cat" id="<?php echo $cat_id; ?>">
			<?php 

		$query = "SELECT * FROM categories";
		$data = mysqli_query($connection, $query);

		while ($row = mysqli_fetch_assoc($data)) {
			$cat_id = $row['cat_id'];
			$cat_title = $row['cat_title'];

			echo "<option value='$cat_id'>{$cat_title}</option>";
		}
 
		?>
		</select>
		
	</div>

	<div class="form-group">
		<label for="author">Post Author</label>
		<input type="text" class="form-control" name="post_author" value="<?php echo $post_author; ?>">
	</div>

	<div class="form-group">
		<label for="user_role">Post Status</label> <br>
		<select name="post_status" id="">
			<option value="<?php echo $post_status; ?>"><?php echo $post_status; ?></option>
			<?php 

			if ($post_status == 'published') {
				echo "<option value='draft'>Draft</option>";
			} else {
				echo "<option value='published'>published</option>";
			}

			?>
		</select>
	</div>

	<div class="form-group">
		<label for="post_image">Post Image</label><br>
		<img width="100" src="../img/<?php echo $post_image; ?>" alt="">
		<input type="file" class="form-control" name="post_image">
	</div>

	<div class="form-group">
		<label for="post_tags">Post Tags</label>
		<input type="text" class="form-control" name="post_tags" value="<?php echo $post_tags; ?>">
	</div>

	<div class="form-group">
		<label for="post_content">Post Content</label>
		<textarea name="post_content" class="form-control" id="" cols="30" rows="10">
		<?php echo $post_content; ?>
		</textarea>
	</div>

	<div class="form-group">
		<input class="btn btn-primary" type="submit" value="Update Post" name="update_post">
	</div>

	
</form>