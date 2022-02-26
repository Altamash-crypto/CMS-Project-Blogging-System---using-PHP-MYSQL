<?php 

//CONNECT TO DATABASE
include 'includes/db.php';

// INCLUDE HEADER
include 'includes/header.php';


//INCLUDE NAVIGATION
include 'includes/navigation.php';


?>

<div class="site-content">
<div class="flex-box">
<div class="atbs-block atbs-block--fullwidth atbs-section-module">



<div class="atbs-block atbs-block--fullwidth atbs-featured-module-4">
<div class="block-heading block-heading_style-1 block-heading-no-line">
<h4 class="block-heading__title">
editor's choise
</h4>
</div>

<div class="atbs-block__inner">
<div class="posts-list flex-box flex-space-30 flex-box-4i posts-list-tablet-2i">



<?php 


if (isset($_GET['page'])) {
    $page = $_GET['page'];

} else {
    $page = "";
}

if ($page == 0 || $page == 1) {
    $page_1 = 0;
} else {
    $page_1 = ($page * 5) - 5;
}



$post_query_count = "SELECT * FROM posts";
$find_count = mysqli_query($connection, $post_query_count);
$count = mysqli_num_rows($find_count);

$count = ceil($count/2);

$query = "SELECT * FROM posts LIMIT $page_1,5";
$data = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($data)) {
    $post_id = $row['post_id'];
    $post_title = $row['post_title'];
    $post_category_id = $row['post_category_id'];
    $post_author = $row['post_author'];
    $post_date = $row['post_date'];
    $post_image = $row['post_image'];
    $post_content = $row['post_content'];
    $post_tags = $row['post_tags'];
    $post_status = $row['post_status'] ;

    if ($post_status == 'published' ) {
        

    ?>

    <div class="list-item">
<article class="post post--overlay post--overlay-normal post--overlay-cylinder-small post--overlay-bottom post--overlay-height-420 b-r-5">
<div class="post__thumb post__thumb--overlay atbs-thumb-object-fit">
<a href="post.php?p_id=<?php echo $post_id; ?>">
    <img src="img/<?php echo $post_image; ?>" alt="file not found">
</a>
</div>
<div class="post__text inverse-text">
<div class="post__text-wrap">
    <div class="post__text-inner">
        <h3 class="post__title f-20 f-w-700 m-b-12">
            <a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title; ?></a>
        </h3>
        <div class="post-tags m-b-25">
            <ul class="list-unstyled list-horizontal">
                <li><a href="./tags.html" class="post-tag" rel="tag"><?php echo $post_tags; ?></a></li>
            </ul>
        </div>
        <div class="post__meta time-style-1 flex-box justify-content-space align-item-center post__meta--border-top">
            <div class="post-author post-author_style-6">
                <div class="post-author__text">
                    <div class="author_name--wrap">
                        <span>by</span>
                        <a class="post-author__name" title="Posts by Connor Randall" rel="author" href="./author.php?author=<?php echo $post_author; ?>&p_id=<?php echo $post_id; ?>"><?php echo $post_author; ?></a>
                    </div>
                </div>
            </div>
            <time class="time published" datetime="2019-03-06T08:45:23+00:00" title="March 6, 2019 at 8:45 am"><?php echo $post_date; ?></time>
        </div>
    </div>
</div>
</div>
<a href="post.php?p_id=<?php echo $post_id; ?>" class="link-overlay"></a>
<a href="./category.html" class="post__cat post__cat--bg overlay-item--top-left"><?php echo $post_category_id; ?></a>
</article>
</div>
    
<?php } }?>
    
</div>
</div>
</div>
<div class="flex-box">


<nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
    <?php 

    for ($i=1; $i <= $count ; $i++) { 
        echo "<li class='page-item'><a class='page-link' href='index.php?page={$i}'>{$i}</a></li>";
    }

    ?>

  </ul>
</nav>




<!-- POPULAR SECTION -->
<div class="atbs-sub-col js-sticky-sidebar">



<div class="widget atbs-atbs-widget atbs-widget-posts-2">
<div class="widget-wrap">
<div class="widget__title">
<h4 class="widget__title-text">Blog Categories</h4>
</div>
<div class="widget__inner">
<div class="posts-list flex-box flex-space-30 flex-box-1i posts-list-tablet-2i">

<?php 

//MAKE QUERY TO DISPLAY CATEGORIES LIST
$query = "SELECT * FROM categories";
$select_cat = mysqli_query($connection, $query);


while ($row = mysqli_fetch_assoc($select_cat)) {
    $cat_id = $row['cat_id'];
    $cat_title = $row['cat_title']; ?>

    <div class="list-item">
    <article class="post post--horizontal post--horizontal-reverse post--horizontal-xxs post--horizontal-middle">
        <div class="post__thumb atbs-thumb-object-fit b-r-5 post__thumb-radius">
            <a href="./single-1.html"><img src="http://via.placeholder.com/180x180" alt="File not found"></a>
        </div>
        <div class="post__text flex-box align-item-center">
            <span class="list-index"><?php echo $cat_id; ?></span>
            <h3 class="post__title f-16 f-w-500 flex-item-auto hover-color-primary">
                <a href="./single-1.html"><?php echo $cat_title; ?></a>
            </h3>
        </div>
    </article>
</div>    



<?php } ?>

</div>
</div>
</div>
</div>



</div>
<!-- END POPULAR SECTION -->

</div>
</div>
<!-- -->

<!-- SIDEBAR START -->
<?php include 'includes/sidebar.php'; ?>
<!-- SIDEBAR END -->

</div>
</div><!-- .site-content -->


<?php 

include 'includes/footer.php';

?>