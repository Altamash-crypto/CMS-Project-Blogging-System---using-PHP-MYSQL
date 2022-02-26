<!-- UPDATE CATEGORY FORM -->
<form action="" method="post">
    <div class="form-group">
        <label for="cat_title">Edit Category</label>
<?php 

if (isset($_GET['edit'])) {
    $edit_cat = $_GET['edit'];

    $query = "SELECT * FROM categories WHERE cat_id = $edit_cat";
    $update_query = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($update_query)) {
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title']; ?>

        <input class="form-control" type="text" name="cat_title" value="<?php if(isset($cat_title)){ echo $cat_title; } ?>">

    <?php  } } ?>

    <?php 

    //UPDATE CATEGORY
    if (isset($_POST['update'])) {
        
        $cat_title = $_POST['cat_title'];

        $query = "UPDATE categories SET cat_title = '$cat_title' WHERE cat_id = {$cat_id}";
        $upd_query = mysqli_query($connection, $query);

    }

    ?>

        
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update" value="update">
    </div>
</form>
