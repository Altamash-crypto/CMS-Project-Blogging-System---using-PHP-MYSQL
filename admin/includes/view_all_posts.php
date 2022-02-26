<?php 

if (isset($_POST['checkboxArrays'])) {
  foreach ($_POST['checkboxArrays'] as $postValueID) {
    $bulk_options = $_POST['bulk_options'];

    switch ($bulk_options) {
      case 'published':

        $query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = {$postValueID}";
        $updt_ps_query = mysqli_query($connection, $query);
        if (!$updt_ps_query) {
          echo "Query Failed ". mysqli_error($connection);
        }
        
        break;

        case 'draft':

        $query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = {$postValueID}";
        $updt_ds_query = mysqli_query($connection, $query);
        if (!$updt_ds_query) {
          echo "Query Failed ". mysqli_error($connection);
        }
        
        break;

        case 'delete':
        
        $query = "DELETE FROM posts WHERE post_id = {$postValueID}";
        $dlt_query = mysqli_query($connection, $query);
        if (!$dlt_query) {
          echo "Query Failed ". mysqli_error($connection);
        }

        break;

        // case 'clone':
        
        // $query = "SELECT * FROM posts WHERE post_id = '{postValueID}'";
        // $slct_post_query = mysqli_query($connection, $query);

        // while ($row = mysqli_fetch_array($slct_post_query)) {
        //   $post_author = $row['post_author'];
        // $post_title = $row['post_title'];
        // $post_category_id = $row['post_category_id'];
        // $post_status = $row['post_status'];
        // $post_image = $row['post_image'];
        // $post_tags = $row['post_tags'];
        // $post_content = $row['post_content'];
        // $post_date = $row['post_date'];
        // }

        // $query = "INSERT into posts(post_title, post_category_id, post_author, post_status, post_image, post_tags, post_content, post_date) VALUES " . "('{$post_title}', {$post_category_id}, '{$post_author}', '{$post_status}', '{$post_image}', '{$post_tags}', '{$post_content}', now())";

        // $copy_query = mysqli_query($connection, $query);
        // if (!$copy_query) {
        //   die("Query Failed ". mysqli_error($connection));
        // }

        // break;


        case 'reset':

        $reset_id = $_GET['reset'];

        $query = "UPDATE posts SET post_views_count = 0 WHERE post_id = ".mysqli_real_escape_string($connection, $postValueID) ." ";
        $rst_query = mysqli_query($connection, $query);
        header('Location: posts.php');

        break;

      default:
        // code...
        break;
    }



  }
}



?>


<form action="" method="post">
<table class="table table-bordered">

  <div class="row">
  <div class="col-xs-4" id="bulkOptionContainer">
    <select class="form-control" name="bulk_options" id="">
      <option value="">Select Option</option>
      <option value="published">Published</option>
      <option value="draft">Draft</option>
      <option value="delete">Delete</option>
      <option value="clone">Clone</option>
      <option value="reset">Reset Post Count View</option>
    </select>
  </div>

  <div class="col-xs-8">
    <input type="submit" name="submit" class="btn btn-success" value="Apply">
    <a class="btn btn-primary" href="posts.php?source=add_post">Add New</a>
  </div>
  </div>


  <thead>
    <tr>
      <th><input id="selectAllBoxes" type="checkbox"></th>
      <th>#</th>
      <th>Title</th>
      <th>Author</th>
      <th>Category</th>
      <th>Status</th>
      <th>Image</th>
      <th>Tags</th>
      <th>Comments</th>
      <th>Date</th>
      <th>View Count</th>
      <th>View Post</th>
      <th>Edit</th>
      <th>Delete</th>


    </tr>
  </thead>
  <tbody>

    <?php 

    //SHOW DATA DROM THE DATABASE
    $query = "SELECT * FROM posts";
    $all_posts = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($all_posts)) {
        $post_id = $row['post_id'];
        $post_title = $row['post_title'];
        $post_author = $row['post_author'];
        $post_category_id = $row['post_category_id'];
        $post_date = $row['post_date'];
        $post_image = $row['post_image'];
        $post_tags = $row['post_tags'];
        $post_comment_count = $row['post_comment_count'];
        $post_status = $row['post_status'];
        $post_views_count = $row['post_views_count']; ?>

        <tr>
          <td><input class="checkBoxes" type='checkbox' name="checkboxArrays[]" value=" <?php echo $post_id; ?> "></td>
          <td><?php echo $post_id; ?></td>
          <td><?php echo $post_title; ?></td>
          <td><?php echo $post_author; ?></td>

          <?php 

          $query = "SELECT * FROM categories WHERE cat_id = {$post_category_id}";
          $slct_cat = mysqli_query($connection, $query);

          while ($row = mysqli_fetch_assoc($slct_cat)) {
            $cat_id = $row['cat_id'];
            $cat_title = $row['cat_title']; ?>

            <td><?php echo $cat_title; ?></td>

          <?php } ?>

          <td><?php echo $post_status; ?></td>
          <td><img class="img-responsive" width="100" src="../img/<?php echo $post_image; ?>" alt="image"></td>
          <td><?php echo $post_tags; ?></td>
          <td><?php echo $post_comment_count; ?></td>
          <td><?php echo $post_date; ?></td>
          <td><a onclick="return confirm('Are you sure you want to reset this count?');" href="posts.php?reset=<?php echo $post_id; ?>"><?php echo $post_views_count; ?></a></td>
          <td><a href="../post.php?p_id=<?php echo $post_id; ?>">View Post</a></td>
          <td><a href="posts.php?source=edit_post&p_id=<?php echo $post_id; ?>"><i class="fa fa-pencil fa-2x" aria-hidden="true"></i></a></td>
          <td><a onclick="return confirm('Are you sure you want to delete this item?');" href="posts.php?delete=<?php echo $post_id; ?>"><i class="fa fa-trash fa-2x" aria-hidden="true"></i></a></td>
        </tr>
    

    <?php }?>

  </tbody>
</table>
</form>


<?php 

//CHECK IF ISSET
if (isset($_GET['delete'])) {
  //GRAB DATA FROM 
  $post_id = $_GET['delete'];

  $query = "DELETE FROM posts WHERE post_id = {$post_id}";
  $dlt_post = mysqli_query($connection, $query);
  header('Location: posts.php');

}

if (isset($_GET['reset'])) {
  //Grab data from url
  $post_id = $_GET['reset'];

  $query = "UPDATE posts SET post_views_count = 0 WHERE post_id = ".mysqli_real_escape_string($connection, $_GET['reset']) ." ";
  $rst_query = mysqli_query($connection, $query);
  header('Location: posts.php');
}





?>