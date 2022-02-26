
<?php include 'includes/header.php'; ?>
<?php include_once '../admin/functions.php'; ?>

<?php ob_start(); ?>

<?php include 'includes/navigation.php'; ?>

<div id="page-wrapper">

<div class="container-fluid">

<!-- Page Heading -->
<div class="row">
<div class="col-lg-12">
<h1 class="page-header">
    Blank Page
    <small>Subheading</small>
</h1>
</div>
<div class="col-md-6">

<?php insert_cat(); ?>

<form action="" method="post">
    <div class="form-group">
        <label for="cat_title">Add Category</label>
        <input class="form-control" type="text" name="cat_title">
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="submit">
    </div>
</form>

<?php 

if (isset($_GET['edit'])) {
    $cat_id = $_GET['edit'];

    include 'includes/update_categories.php';
}

?>


</div>
<div class="col-md-6">
<table class="table">
<thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Categories</th>
        <th scope="col">Delete</th>
        <th scope="col">Edit</th>
    </tr>
</thead>
<tbody>
    
    <!-- DISPLAY FUNCTION -->
    <?php findAllCat(); ?>

    <!-- DELETE FUNCTION -->
    <?php deleteCat(); ?>

</tbody>
</table>
</div>  
</div>
<!-- /.row -->

</div>
<!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

<?php include 'includes/footer.php'; ?>