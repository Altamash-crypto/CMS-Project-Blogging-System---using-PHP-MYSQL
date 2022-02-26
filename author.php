<?php include 'includes/db.php'; ?>
<?php include 'includes/header.php' ?>
<?php include 'includes/navigation.php' ?>


<div class="site-content">
<div class="flex-box">
<div class="atbs-block atbs-block--fullwidth atbs-section-module">
<div class="flex-box">
<div class="atbs-main-col">
<div class="author-box author-box-list">
<div class="author-box__image">
<div class="author-avatar">
<img src="http://via.placeholder.com/180x180" class="avatar photo" alt="File Not Found">
</div>
</div>
<div class="author-box__text">
<div class="author-name meta-font">
<a href="./author.html" title="Posts by Ryan Reynold" rel="author">

    <?php
    if (isset($_SESSION['user-role'])) {
        echo $_SESSION['username'];    
    }

    ?></a>
</div>
<div class="author-bio">
Ryan Reynold is a writer based in New York. When he's not writing about apps, marketing, or tech, you can probably catch him eating ice cream.
</div>
<div class="author-info">
<div class="author-socials">
<ul class="list-unstyled list-horizontal list-space-sm">
<li><a href="#"><i class="mdicon mdicon-mail_outline"></i><span class="sr-only">e-mail</span></a></li>
<li><a href="#"><i class="mdicon mdicon-twitter"></i><span class="sr-only">Twitter</span></a></li>
<li><a href="#"><i class="mdicon mdicon-facebook"></i><span class="sr-only">Facebook</span></a></li>
<li><a href="#"><i class="mdicon mdicon-google-plus"></i><span class="sr-only">Google+</span></a></li>
</ul>
</div>
</div>
</div>
</div>
<div class="atbs-block atbs-block--fullwidth atbs-posts-listing--grid-2-has-sidebar">
<div class="atbs-block__inner">
<div class="posts-list flex-box flex-box-3i flex-space-30 posts-list-tablet-2i">

<?php 

if (isset($_GET['p_id'])) {
    $the_post_id = $_GET['p_id'];
    $the_post_author = $_GET['author'];
}

    $query = "SELECT * FROM posts WHERE post_author = '{$the_post_author}'";
    $slct_all_auth_post = mysqli_query($connection, $query);
    if (!$slct_all_auth_post) {
        die("Query Failed ". mysqli_error($connection));
    }

    while ($row = mysqli_fetch_array($slct_all_auth_post)) {
        $post_id = $row['post_id'];
        $post_category_id = $row['post_category_id'];
        $post_title = $row['post_title'];
        $post_date = $row['post_date'];
        $post_image = $row['post_image'];
        $post_author = $row['post_author']; ?>

        <div class="list-item">
<article class="post post--vertical post--vertical-card-background post--vertical-card-background-small post--hover-theme">
<div class="post__thumb object-fit b-r-8 post__thumb-radius">
<a href="post.php?p_id=<?php echo $post_id; ?>">
<img src="img/<?php echo $post_image; ?>" alt="File not found">
</a>
</div>
<div class="post__text inverse-text text-center">
<a href="./category.html" class="post__cat"><?php echo $post_category_id; ?></a>
<h3 class="post__title f-20 f-w-600 m-b-10 m-t-10 atbs-line-limit atbs-line-limit-2">
<a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title; ?></a>
</h3>
<div class="post__meta border-avatar flex-box align-item-center justify-content-space">
<div class="post-author post-author_style-7">

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


</div>
</div>
<!-- -->


</div>
</div><!-- .site-content -->

<?php include 'includes/footer.php' ?>