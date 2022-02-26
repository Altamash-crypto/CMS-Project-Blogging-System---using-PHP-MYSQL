<?php 

//FUNCTION FOR INSERTING CATEGORY

function insert_cat() {

	global $connection;

//GRAB DATA FROM FORM
if (isset($_POST['submit'])) {
    //GRAB DATA FROM FORM
    $cat_title = $_POST['cat_title'];
    //SEND ERROR IF FORM IS EMPTY
    if (!empty($cat_title)) {
        //INSERT CATEGORY IN DATABSE
        $query = "INSERT into categories(cat_title) VALUE('{$cat_title}')";
        $insert_query = mysqli_query($connection, $query);
    } else {
        //DISPLAY AN ERROR 
        echo "<p class='text-danger'>This field should not be empty</p>";
    }
}

}
 
  
  function findAllCat() {

  	global $connection;

  	 //DISPLAY DATA FROM THE DATABSE
    $query = "SELECT * FROM categories";
    $all_cat = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($all_cat)) {
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title']; ?>

        <tr>
        <th scope="row"><?php echo $cat_id; ?></th>
        <td><?php echo $cat_title; ?></td>
        <td><a onclick="return confirm('Are you sure you want to delete this category?');" href='categories.php?delete=<?php echo $cat_id; ?>'>Delete</a></td>
        <td><a href='categories.php?edit=<?php echo $cat_id; ?>'>Edit</a></td>
    </tr>

  <?php } } ?>


 <?php 

 function deleteCat() {
    global $connection;
//DELETE QUERY FROM GET METHOD
 if (isset($_GET['delete'])) {
     //GRAB DELETE FROM URL
    $dlt_id = $_GET['delete'];
    $query = "DELETE FROM categories WHERE cat_id = {$dlt_id}";
    $dlt_query = mysqli_query($connection, $query);
    if (!$dlt_query) {
        die("Query Failed" . mysqli_error($dlt_query));
    }
    header('Location: categories.php');

 }
 }


 function users_online() {
    
    global $connection;

    $session = session_id();
    $time = time();
    $time_out_in_seconds = 60;
    $time_out = $time - $time_out_in_seconds;

    $query = "SELECT * FROM users_online WHERE session = '$session'";
    $send_query = mysqli_query($connection, $query);
    $count = mysqli_num_rows($send_query);

    if ($count == NULL) {
        mysqli_query($connection, "INSERT INTO users_online(session, time) VALUES('$session', '$time')");
    } else {
        mysqli_query($connection, "UPDATE users_online SET $time = '$time' WHERE session = '$session'");
    }

    $user_online_query = mysqli_query($connection, "SELECT * FROM users_online WHERE time < $time_out");
    return $count_user = mysqli_num_rows($user_online_query);
 }


 ?>