<table class="table table-bordered">
  <thead>
    <tr>
      <th>#</th>
      <th>Username</th>
      <th>Password</th>
      <th>Firstname</th>
      <th>Lastname</th>
      <th>Email</th>
      <th>Image</th>
      <th>Role</th>
      <th>Admin</th>
      <th>Subscriber</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody>

    <?php 

//SHOW DATA DROM THE DATABASE
    $query = "SELECT * FROM users";
    $all_users = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($all_users)) {
      $user_id = $row['user_id'];
      $username = $row['username'];
      $user_password = $row['user_password'];
      $user_firstname = $row['user_firstname'];
      $user_lastname = $row['user_lastname'];
      $user_email = $row['user_email'];
      $user_image = $row['user_image'];
      // $user_image = $_FILES['name']['tmp_name'];
      // $user_tmp_image = $_FILES['name']['tmp_name'];
      $user_role = $row['user_role'];



      ?>

        <tr>
          <td><?php echo $user_id; ?></td>
          <td><?php echo $username; ?></td>
          <td><?php echo $user_password; ?></td>
          <td><?php echo $user_firstname; ?></td>
          <td><?php echo $user_lastname; ?></td>
          <td><?php echo $user_email; ?></td>
          <td><?php echo $user_image; ?></td>
          <td><?php echo $user_role; ?></td>
          <td><a href="users.php?change_to_ad=<?php echo $user_id; ?>">Admin</a></td>
          <td><a href="users.php?change_to_sub=<?php echo $user_id; ?>">Subscriber</a></td>
          <td><a href="users.php?source=edit_user&edit_user=<?php echo $user_id; ?>">Edit</a></td>
          <td><a onclick="return confirm('Are you sure you want to delete this user?');" href="users.php?delete=<?php echo $user_id; ?>">Delete</a></td>
        </tr>
    

    <?php }?>

    <?php 


    //ADMIN USERS
    if (isset($_GET['change_to_ad'])) {
      $user_id = $_GET['change_to_ad'];

      $query = "UPDATE users SET user_role = 'admin' WHERE user_id = $user_id";
      $ad_user = mysqli_query($connection, $query);
      if (!$ad_user) {
        die('Query Failed ' . mysqli_error($connection));
      }
      header('Location: users.php');

    }
    


    //SUBSCRIBER USER
    if (isset($_GET['change_to_sub'])) {
      $user_id = $_GET['change_to_sub'];

      $query = "UPDATE users SET user_role = 'subscriber' WHERE user_id = $user_id";
      $sub_user = mysqli_query($connection, $query);
      if (!$sub_user) {
        die('Query Failed ' . mysqli_error($connection));
      }
      header('Location: users.php');

    }


    //DELETE USERS

if (isset($_GET['delete'])) {
  $user_id = $_GET['delete'];

  $query = "DELETE FROM users WHERE user_id = $user_id";
  $dlt_user = mysqli_query($connection, $query);
  if (!$dlt_user) {
    echo "Query Failed ". mysqli_error($connection);
  }
  header('Location: users.php');

}

    ?>

  </tbody>
</table>