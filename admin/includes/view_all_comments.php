<table class="table table-striped">
  <thead>
    <tr>
      <th>#</th>
      <th>ID</th>
      <th>Author</th>
      <th>Email</th>
      <th>Response</th>
      <th>Comments</th>
      <th>Status</th>
      <th>Date</th>
      <th>Approve</th>
      <th>Unapprove</th>
      <th>Delete</th>


    </tr>
  </thead>
  <tbody>

    <?php 

//SHOW DATA DROM THE DATABASE
    $query = "SELECT * FROM comments";
    $all_comments = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($all_comments)) {
      $comment_id = $row['comment_id'];
      $comment_post_id = $row['comment_post_id'];
      $comment_author = $row['comment_author'];
      $comment_email = $row['comment_email'];
      $comment_content = $row['comment_content'];
      $comment_status = $row['comment_status'];
      $comment_date = $row['comment_date']; ?>

        <tr>
          <td><?php echo $comment_id; ?></td>
          <td><?php echo $comment_post_id; ?></td>
          <td><?php echo $comment_author; ?></td>
          <td><?php echo $comment_email; ?></td>
          <?php 

          $query = "SELECT * FROM posts WHERE post_id = $comment_post_id";
          $slct_post_query = mysqli_query($connection, $query);

          while ($row = mysqli_fetch_assoc($slct_post_query)) {

            $post_id = $row['post_id'];
            $post_title = $row['post_title']; ?>

            <td><a target='_blank' href='../post.php?p_id=<?php echo $post_id; ?>'><?php echo $post_title; ?></td>
          <?php } ?>

          <td><?php echo $comment_content; ?></td>
          <td><?php echo $comment_status; ?></td>
          <td><?php echo $comment_date; ?></td>
          <td><a href="comments.php?approved=<?php echo $comment_id; ?>">Approved</a></td>
          <td><a href="comments.php?unapproved=<?php echo $comment_id; ?>">Unapproved</a></td>
          <td><a onclick="return confirm('Are you sure you want to delete this item?');" href="comments.php?delete=<?php echo $comment_id; ?>">Delete</a></td>
        </tr>
    

    <?php }?>

    <?php 


    //Approve Comment
    if (isset($_GET['approved'])) {
      $comment_id = $_GET['approved'];

      $query = "UPDATE comments SET comment_status = 'approved' WHERE comment_id = $comment_id";
      $approved_commnt = mysqli_query($connection, $query);
      header('Location: comments.php');
    }


    //Unapprove Comment
    if (isset($_GET['unapproved'])) {
      $comment_id = $_GET['unapproved'];

      $query = "UPDATE comments SET comment_status = 'unapproved' WHERE comment_id = $comment_id";
      $unapproved_commnt = mysqli_query($connection, $query);
      header('Location: comments.php');
    }


    //DELETE COMMENTS

if (isset($_GET['delete'])) {
  $comment_id = $_GET['delete'];

  $query = "DELETE FROM comments WHERE comment_id = $comment_id";
  $dlt_cmmnt = mysqli_query($connection, $query);
  if (!$dlt_cmmnt) {
    echo "Query Failed ". mysqli_error($connection);
  }
  header('Location: comments.php');

}

    ?>

  </tbody>
</table>