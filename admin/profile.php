
<?php include 'includes/header.php'; ?>

<?php ob_start(); ?>

<?php include 'includes/navigation.php'; ?>

<div id="page-wrapper">

<div class="container-fluid">

<!-- Page Heading -->
<div class="row">
<div class="col-lg-12">
<h1 class="page-header">
    Posts
    <small>Admin</small>
</h1>

<?php 
if (isset($_SESSION['username'])) {
  $username = $_SESSION['username'];
  $query = "SELECT * FROM users WHERE username = '{$username}'";
  $slct_all_user = mysqli_query($connection, $query);

  while ($row = mysqli_fetch_array($slct_all_user)) {
      $user_id = $row['user_id'];
      $username = $row['username'];
      $user_password = $row['user_password'];
      $user_firstname = $row['user_firstname'];
      $user_lastname = $row['user_lastname'];
      $user_email = $row['user_email'];
      $user_image = $row['user_image'];
      $user_role = $row['user_role'];


  }
}


if (isset($_POST['update_profile'])) {
    //GRAB THE CODE FROM THE FORM

    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_role = $_POST['user_role'];
    $username = $_POST['username'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    
    // move_uploaded_file($post_image_tmp, '../img/' .$post_image );

    $query = "UPDATE users SET ";
          $query .="user_firstname  = '{$user_firstname}', ";
          $query .="user_lastname = '{$user_lastname}', ";
          $query .="user_role   =  '{$user_role}', ";
          $query .="username = '{$username}', ";
          $query .="user_email = '{$user_email}', ";
          $query .="user_password   = '{$user_password}' ";
          $query .= "WHERE username = '{$username}' ";

    $updt_profile = mysqli_query($connection, $query);
    if (!$updt_profile) {
      echo 'Query Failed ' . mysqli_error($connection);
    }

  }


?>


<form action="" method="post" enctype="multipart/form-data">

  <div class="form-group">
    <label for="firstname">Firstname</label>
    <input type="text" class="form-control" name="user_firstname" value="<?php echo $user_firstname; ?>">
  </div>

  <div class="form-group">
    <label for="lastname">Lastname</label>
    <input type="text" class="form-control" name="user_lastname" value="<?php echo $user_lastname; ?>">
  </div>

  <div class="form-group">
    <label for="user_role">User Role</label> <br>
    <select name="user_role" id="">
      <option value="subscriber"><?php echo $user_role; ?></option>
      <?php 

      if ($user_role == 'admin') {
        echo "<option value='subscribe'>subscribe</option>";
      } else {
        echo "<option value='admin'>admin</option>";
      }

      ?>
    </select>
  </div>

  <div class="form-group">
    <label for="username">Username</label>
    <input type="text" class="form-control" name="username" value="<?php echo $username; ?>">
  </div>

  <div class="form-group">
    <label for="email">Email</label>
    <input type="text" class="form-control" name="user_email" value="<?php echo $user_email; ?>">
  </div>

  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" name="user_password" value="<?php echo $user_password; ?>">
  </div>

  <!-- <div class="form-group">
    <label for="post_image">Post Image</label>
    <input type="file" class="form-control" name="post_image">
  </div> -->

  <div class="form-group">
    <input class="btn btn-primary" type="submit" value="Update Profile" name="update_profile">
  </div>

  
</form>


</div>
</div>
<!-- /.row -->

</div>
<!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

<?php include 'includes/footer.php'; ?>