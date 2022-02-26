<?php 

	if (isset($_POST['create_user'])) {
		//GRAB THE CODE FROM THE FORM
		$user_firstname = $_POST['user_firstname'];
		$user_lastname = $_POST['user_lastname'];
		$user_role = $_POST['user_role'];

		// $post_image = $_FILES['post_image']['name'];
		// $post_image_tmp = $_FILES['post_image'] ['tmp_name'];

		$username = $_POST['username'];
		$user_email = $_POST['user_email'];
		$user_password = $_POST['user_password'];
		
		// move_uploaded_file($post_image_tmp, '../img/' .$post_image );

		$query = "INSERT into users(user_firstname, user_lastname, user_role, username, user_email, user_password) VALUES " . "('{$user_firstname}', '{$user_lastname}', '{$user_role}', '{$username}', '{$user_email}', '{$user_password}')";

		$user_in_query = mysqli_query($connection, $query);
		if (!$user_in_query) {
			echo 'Query Failed ' . mysqli_error($connection);
		}

		echo "<p class='bg-success'>User Created: " . " " . "<a href='users.php'>View Users</a></p>";

	}

?>



<form action="" method="post" enctype="multipart/form-data">

	<div class="form-group">
		<label for="firstname">Firstname</label>
		<input type="text" class="form-control" name="user_firstname">
	</div>

	<div class="form-group">
		<label for="lastname">Lastname</label>
		<input type="text" class="form-control" name="user_lastname">
	</div>

	<div class="form-group">
		<label for="user_role">User Role</label> <br>
		<select name="user_role" id="">
			<option value='subscriber'>Select Options</option>
			<option value='admin'>Admin</option>
			<option value='subscriber'>Subscriber</option>
		</select>
	</div>

	<div class="form-group">
		<label for="username">Username</label>
		<input type="text" class="form-control" name="username">
	</div>

	<div class="form-group">
		<label for="email">Email</label>
		<input type="text" class="form-control" name="user_email">
	</div>

	<div class="form-group">
		<label for="password">Password</label>
		<input type="password" class="form-control" name="user_password">
	</div>

	<!-- <div class="form-group">
		<label for="post_image">Post Image</label>
		<input type="file" class="form-control" name="post_image">
	</div> -->

	<div class="form-group">
		<input class="btn btn-primary" type="submit" value="add user" name="create_user">
	</div>

	
</form>