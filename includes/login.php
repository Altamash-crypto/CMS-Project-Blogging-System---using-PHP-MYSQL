<?php 

include 'db.php';


if (isset($_POST['submit'])) {
	//GRAB USER DATA FROM THE FORM
	$username = mysqli_real_escape_string($connection, trim($_POST['username']));
	$password = mysqli_real_escape_string($connection, trim($_POST['password']));

	//CHECK FOR VALIDATION
	if (!empty($username) && !empty($password)) {
		//CHECK DATA IN THE DATABASE
		$query = "SELECT * FROM users WHERE username = '{$username}' AND user_password = '{$password}'";
		$all_users = mysqli_query($connection, $query);

		if (mysqli_num_rows($all_users) == 1) {
			while ($row = mysqli_fetch_array($all_users)) {
				$db_user_id = $row['user_id'];
				$db_username = $row['username'];
				$db_user_password = $row['user_password'];
				$db_user_firstname = $row['user_firstname'];
				$db_user_lastname = $row['user_lastname'];
				$db_user_role = $row['user_role'];
			}

			$password = crypt($password, $db_user_password);


			session_start();
			$_SESSION['username'] = $db_username;
			$_SESSION['firstname'] = $db_user_firstname;
			$_SESSION['lastname'] = $db_user_lastname;
			$_SESSION['user_role'] = $db_user_role;

			header('Location: ../admin/index.php');

		} else {
			echo '<p class="danger danger-alert">You must enter a valid username/password</p>';
		}
	} else {
		echo '<p class="danger danger-alert">Please enter valid username/password</p>';
	}

}




?>