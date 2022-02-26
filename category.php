<?php 

include 'includes/db.php';

include 'includes/header.php';

include 'includes/navigation.php';


?>
<div class="site-content">
<div class="flex-box">
<div class="atbs-block atbs-block--fullwidth atbs-section-module">
<div class="atbs-block atbs-block--fullwidth atbs-featured-module-3">
<div class="block-heading block-heading_style-1 block-heading-no-line">
<h4 class="block-heading__title">
Gadgets News
</h4>
</div>
<div class="atbs-block__inner">
<div class="posts-list flex-box flex-space-30 flex-box-4i posts-list-tablet-2i">

<?php 

if (isset($_GET['category'])) {
    $post_category_id = $_GET['category'];

}

$query = "SELECT * FROM posts WHERE post_category_id = $post_category_id";
$slct_cat_id = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($slct_cat_id)) {
        $post_title = $row['post_title'];
        $post_category_id = $row['post_category_id'];
        $post_author = $row['post_author'];
        $post_date = $row['post_date'];
        $post_image = $row['post_image'];
        $post_content = $row['post_content'];
        $post_tags = $row['post_tags']; ?>


        <div class="list-item">
<article class="post post--vertical post--vertical-style-card-thumb-aside atbs-post-hover-theme-style post--hover-theme" data-dark-mode="true">
<div class="post__thumb object-fit">
<a href="./single-1.html">
    <img src="img/<?php echo $post_image; ?>" alt="File not found">
</a>
</div>
<div class="post__text flex-box flex-direction-column inverse-text">
<div class="post__text-group">
    <a href="./category.html" class="post__cat post__cat-primary"><?php echo $post_category_id; ?></a>
    <h3 class="post__title f-20 f-w-600 m-b-10 m-t-10 atbs-line-limit atbs-line-limit-3">
        <a href="./single-1.html"><?php echo $post_title; ?></a>
    </h3>
    <div class="post-tags">
        <ul class="list-unstyled list-horizontal">
            <li><a href="./tags.html" class="post-tag" rel="tag"><?php echo $post_tags; ?></a></li>
        </ul>
    </div>
</div>
<div class="post__text-group flex-item-auto-bottom">
    <div class="post__meta time-style-1 flex-box justify-content-space align-item-center">
        <div class="post-author post-author_style-6">
            <div class="post-author__text">
                <div class="author_name--wrap">
                    <span>by</span>
                    <a class="post-author__name" title="Posts by Connor Randall" rel="author" href="./author.html"><?php echo $post_author; ?></a>
                </div>
            </div>
        </div>
        <time class="time published" datetime="2019-03-06T08:45:23+00:00" title="March 6, 2019 at 8:45 am"><?php echo $post_date; ?></time>
    </div>
</div>
</div>
</article>
</div>


<?php } ?>


</div>
<nav class="atbs-pagination text-center">
<a href="#" class="btn btn-default">Load More</a>
</nav>
</div>
</div>
</div>
<!-- -->



</div>
</div><!-- .site-content -->

<?php 

include 'includes/footer.php';

?>