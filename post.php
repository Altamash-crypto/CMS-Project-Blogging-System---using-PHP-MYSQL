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

    <?php 
    if (isset($_GET['p_id'])) {
        $post_id = $_GET['p_id'];

        $query = "UPDATE posts SET post_views_count = post_views_count + 1 WHERE post_id = $post_id";
        $view_query = mysqli_query($connection, $query);

    $query = "SELECT * FROM posts WHERE post_id = $post_id";
    $slct_all_post = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($slct_all_post)) {
        $post_title = $row['post_title'];
        $post_category_id = $row['post_category_id'];
        $post_author = $row['post_author'];
        $post_date = $row['post_date'];
        $post_image = $row['post_image'];
        $post_content = $row['post_content'];
        $post_tags = $row['post_tags'];
    }

    }


    ?>



<div class="atbs-block atbs-block--fullwidth single-1 atbs-section-module">
<div class="atbs-block atbs-block--fullwidth atbs-single-header">
<div class="single-header__inner">
<div class="entry-thumb single-entry-thumb">
<img src="img/<?php echo $post_image; ?>" alt="File not found">
</div>
</div>
</div>
<div class="atbs-block atbs-block--fullwidth single-entry-wrap">
<div class="flex-box">
<div class="atbs-main-col">
<article class="post post--single">
<div class="single-content">
<header class="single-header inverse-text">
    <?php 
    $query = "SELECT * FROM categories WHERE cat_id = {$post_category_id}";
    $slct_cat = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($slct_cat)) {
        $cat_title = $row['cat_title'];

        echo "<a href='./category.html' class='entry-cat post__cat'>$cat_title</a>";
    }



    ?>
<h1 class="entry-title f-44 f-w-700"><?php echo $post_title; ?></h1>
</header>
<div class="single-body entry-content typography-copy">
<div class="single-row">
<div class="single-presentation">
<p><?php echo $post_content; ?></p>



</div>
<div class="single-box-translate js-sticky-sidebar">
<div class="entry-meta">
<div class="entry-author entry-author_style-1">
<a class="entry-author__avatar" href="./author.html" title="Posts by Connor Randall" rel="author">
<img alt="Connor Randall" src="http://via.placeholder.com/100x100">
</a>
<div class="entry-author__text">
<a class="entry-author__name" title="Posts by Connor Randall" rel="author" href="./author.html">Loren Ben</a>
<time class="time published" datetime="2019-03-06T08:45:23+00:00" title="March 6, 2019 at 8:45 am">6 December 2021</time>
</div>
</div>
</div>
<div class="socials-share-box">
<span class="social-share-label">Share</span>
<ul class="social-list">
<li class="facebook-share">
<a class="sharing-btn sharing-btn-primary facebook-btn facebook-theme-bg-hover" data-placement="top" title="Share on Facebook" href="#">
<div class="share-item__icon">
<svg fill="#888" preserveAspectRatio="xMidYMid meet" height="1.3em" width="1.3em" viewBox="0 0 40 40">
<g>
<path d="m21.7 16.7h5v5h-5v11.6h-5v-11.6h-5v-5h5v-2.1c0-2 0.6-4.5 1.8-5.9 1.3-1.3 2.8-2 4.7-2h3.5v5h-3.5c-0.9 0-1.5 0.6-1.5 1.5v3.5z"></path>
</g>
</svg>
</div>
</a>
</li>
<li class="twitter-share">
<a class="sharing-btn sharing-btn-primary twitter-btn twitter-theme-bg-hover" data-placement="top" title="Share on Twitter" href="#">
<div class="share-item__icon">
<svg fill="#888" preserveAspectRatio="xMidYMid meet" height="1.3em" width="1.3em" viewBox="0 0 40 40">
<g>
<path d="m31.5 11.7c1.3-0.8 2.2-2 2.7-3.4-1.4 0.7-2.7 1.2-4 1.4-1.1-1.2-2.6-1.9-4.4-1.9-1.7 0-3.2 0.6-4.4 1.8-1.2 1.2-1.8 2.7-1.8 4.4 0 0.5 0.1 0.9 0.2 1.3-5.1-0.1-9.4-2.3-12.7-6.4-0.6 1-0.9 2.1-0.9 3.1 0 2.2 1 3.9 2.8 5.2-1.1-0.1-2-0.4-2.8-0.8 0 1.5 0.5 2.8 1.4 4 0.9 1.1 2.1 1.8 3.5 2.1-0.5 0.1-1 0.2-1.6 0.2-0.5 0-0.9 0-1.1-0.1 0.4 1.2 1.1 2.3 2.1 3 1.1 0.8 2.3 1.2 3.6 1.3-2.2 1.7-4.7 2.6-7.6 2.6-0.7 0-1.2 0-1.5-0.1 2.8 1.9 6 2.8 9.5 2.8 3.5 0 6.7-0.9 9.4-2.7 2.8-1.8 4.8-4.1 6.1-6.7 1.3-2.6 1.9-5.3 1.9-8.1v-0.8c1.3-0.9 2.3-2 3.1-3.2-1.1 0.5-2.3 0.8-3.5 1z"></path>
</g>

</svg>
</div>
</a>
</li>
<li class="pinterest-share">
<a class="sharing-btn pinterest-btn pinterest-theme-bg-hover" data-placement="top" title="Share on Pinterest" href="#">
<div class="share-item__icon">
<svg fill="#888" preserveAspectRatio="xMidYMid meet" height="1.3em" width="1.3em" viewBox="0 0 40 40">
<g>
<path d="m37.3 20q0 4.7-2.3 8.6t-6.3 6.2-8.6 2.3q-2.4 0-4.8-0.7 1.3-2 1.7-3.6 0.2-0.8 1.2-4.7 0.5 0.8 1.7 1.5t2.5 0.6q2.7 0 4.8-1.5t3.3-4.2 1.2-6.1q0-2.5-1.4-4.7t-3.8-3.7-5.7-1.4q-2.4 0-4.4 0.7t-3.4 1.7-2.5 2.4-1.5 2.9-0.4 3q0 2.4 0.8 4.1t2.7 2.5q0.6 0.3 0.8-0.5 0.1-0.1 0.2-0.6t0.2-0.7q0.1-0.5-0.3-1-1.1-1.3-1.1-3.3 0-3.4 2.3-5.8t6.1-2.5q3.4 0 5.3 1.9t1.9 4.7q0 3.8-1.6 6.5t-3.9 2.6q-1.3 0-2.2-0.9t-0.5-2.4q0.2-0.8 0.6-2.1t0.7-2.3 0.2-1.6q0-1.2-0.6-1.9t-1.7-0.7q-1.4 0-2.3 1.2t-1 3.2q0 1.6 0.6 2.7l-2.2 9.4q-0.4 1.5-0.3 3.9-4.6-2-7.5-6.3t-2.8-9.4q0-4.7 2.3-8.6t6.2-6.2 8.6-2.3 8.6 2.3 6.3 6.2 2.3 8.6z"></path>
</g>
</svg>
</div>
</a>
</li>
<li class="linkedin-share">
<a class="sharing-btn linkedin-btn linkedin-theme-bg-hover" data-placement="top" title="Share on Linkedin" href="#">
<div class="share-item__icon">
<svg fill="#888" preserveAspectRatio="xMidYMid meet" height="1.3em" width="1.3em" viewBox="0 0 40 40">
<g>
<path d="m13.3 31.7h-5v-16.7h5v16.7z m18.4 0h-5v-8.9c0-2.4-0.9-3.5-2.5-3.5-1.3 0-2.1 0.6-2.5 1.9v10.5h-5s0-15 0-16.7h3.9l0.3 3.3h0.1c1-1.6 2.7-2.8 4.9-2.8 1.7 0 3.1 0.5 4.2 1.7 1 1.2 1.6 2.8 1.6 5.1v9.4z m-18.3-20.9c0 1.4-1.1 2.5-2.6 2.5s-2.5-1.1-2.5-2.5 1.1-2.5 2.5-2.5 2.6 1.2 2.6 2.5z"></path>
</g>
</svg>
</div>
</a>
</li>
</ul>
</div>
</div>
</div>
</div>
</div><!-- .single-content -->
</article>


<div class="comments-section single-entry-section">
<div id="comments" class="comments-area">
<div class="block-heading block-heading_style-1 block-heading-no-line">
    
    <?php 

    $query = "SELECT * FROM posts WHERE post_id = $post_id";
    $show_comm = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($show_comm)) {
        $post_comment_count = $row['post_comment_count']; ?>

        <h4 class="block-heading__title"><?php echo $post_comment_count; ?> Comments</h4>
    
    <?php } ?>

    

</div>


<?php 

    $query = "SELECT * FROM comments WHERE comment_post_id = $post_id AND comment_status = 'approved' ORDER BY comment_id DESC";
    $slct_comm = mysqli_query($connection, $query);
    if (!$slct_comm) {
        die('Query Failed '. mysqli_error($connection));
    }

    while ($row = mysqli_fetch_assoc($slct_comm)) {
        $comment_id = $row['comment_id'];
        $comment_post_id = $row['comment_post_id'];
        $comment_author = $row['comment_author'];
        $comment_content = $row['comment_content'];
        $comment_date = $row['comment_date']; ?>
    
        <ol class="comment-list">
<li id="comment-4" class="comment even thread-even depth-1 parent">

<div id="div-comment-4" class="comment-body">
<footer class="comment-meta">
<div class="comment-author vcard">
<img src="http://via.placeholder.com/180x180" class="avatar photo" alt="avatar"><b class="fn"><?php echo $comment_author; ?></b><span class="says">says:</span>
</div><!-- .comment-author -->
<div class="comment-metadata">
<a href="#">
<time datetime="2016-10-21T13:31:45+00:00"><?php echo $comment_date; ?></time>
</a>
</div><!-- .comment-metadata -->
</footer><!-- .comment-meta -->
<div class="comment-content">
<p><?php echo $comment_content; ?></p>
</div><!-- .comment-content -->
<div class="reply">
<a rel="nofollow" class="comment-reply-link" href="#" aria-label="Reply to Sculpture Fan">Reply</a>
</div>
</div><!-- .comment-body -->
</li><!-- #comment-## -->
</ol>




    <?php  } ?>



<div id="respond" class="comment-respond">
<h3 id="reply-title" class="comment-reply-title">Leave a Reply <small><a rel="nofollow" id="cancel-comment-reply-link" href="#" style="display: none;">Cancel reply</a></small></h3>

<?php 

    if (isset($_POST['submit'])) {

        $the_post_id = $_GET['p_id'];
        $comment_author = $_POST['author'];
        $comment_email = $_POST['email'];
        $comment_content = $_POST['comment'];

        if (!empty($comment_author) && !empty($comment_email) && !empty($comment_content)) {
            
        $query = "INSERT INTO comments(comment_post_id, comment_author, comment_email, comment_content, comment_status, comment_date) VALUES($the_post_id, '{$comment_author}', '{$comment_email}', '{$comment_content}', 'unapproved', now())";
        $insert_comm = mysqli_query($connection, $query);

        if (!$insert_comm) {
            die('Query Failed ' . mysqli_error($connection));
        }


        $query = "UPDATE posts SET post_comment_count = post_comment_count + 1 WHERE post_id = $the_post_id ";
        $updt_comm = mysqli_query($connection, $query);

        } else {
            echo "<p class='text-danger'>Feild Should not be empty.</p>";
        }

    }



?>

<form action="#" method="post" id="commentform" class="comment-form" novalidate="">
<p class="comment-notes"><span id="email-notes">Your email address will not be published.</span>Required fields are marked <span class="required">*</span></p>

<p class="comment-form-comment">
<label for="comment">Comment</label>
<textarea id="comment" class="form-control-custom" name="comment" cols="45" rows="8" maxlength="65525" required="required" placeholder="Your review"></textarea>
</p>
<p class="comment-form-author">
<label for="author">Name <span class="required">*</span></label>
<input id="author" class="form-control-custom" name="author" type="text" value="" size="30" maxlength="245" required="required" placeholder="Name *">
</p>
<p class="comment-form-email">
<label for="email">Email <span class="required">*</span></label>
<input id="email" class="form-control-custom" name="email" type="email" value="" size="30" maxlength="100" aria-describedby="email-notes" required="required" placeholder="Email *">
</p>
<p class="form-submit">
<input name="submit" type="submit" id="submit" class="submit" value="Post Comment">
<input type="hidden" name="comment_post_ID" value="44" id="comment_post_ID">
<input type="hidden" name="comment_parent" id="comment_parent" value="0">
</p>
</form>

</div><!-- #respond -->
</div><!-- #comments -->
</div>


</div>



</div>
</div>
</div>
<div class="atbs-section-sidebar js-sticky-sidebar">
<div class="widget atbs-atbs-widget atbs-widget-author-box">
<div class="widget-wrap">
<div class="widget__inner">
<div class="author-box author-box-vertical">
<div class="author-box__image">
<div class="author-avatar">
<img alt="designUTD" src="http://via.placeholder.com/250x250" class="avatar avatar-150 photo avatar photo" height="150" width="150" loading="lazy">
</div>
</div>
<div class="author-box__text">
<div class="author-name meta-font">
<a class="entry-author__name" rel="author" title="designUTD" href="./author.html">designUTD</a>
</div>
<div class="author-bio">
Welcome to my blog where I share my lifestyle tips
</div>
<div class="author-info">
<ul class="list-unstyled list-horizontal list-space-sm">
<li><a href="mailto:#"><i class="mdicon mdicon-mail_outline"></i><span class="sr-only">e-mail</span></a></li>
<li><a href="https://leonas.bk-ninja.com/default" target="_blank"><i class="mdicon mdicon-public"></i><span class="sr-only">Website</span></a></li>
<li><a href="#" target="_blank"><i class="mdicon mdicon-twitter"></i><span class="sr-only">Twitter</span></a></li>
<li><a href="#" target="_blank"><i class="mdicon mdicon-facebook"></i><span class="sr-only">Facebook</span></a></li>
</ul>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="atbs-widget-social-counter widget atbs-atbs-widget">
<div class="atbs-widget-social-counter__inner">
<ul class="flex-box flex-box-2i flex-space-20 list-unstyled">
<li>
<a href="#" class="social-title social-facebook">
<div class="social-title__icon">
<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25">
<g id="facebook" transform="translate(0)">
<path id="Path_1508" data-name="Path 1508" d="M23.62,0H1.379A1.38,1.38,0,0,0,0,1.38V23.621A1.38,1.38,0,0,0,1.38,25H23.62A1.38,1.38,0,0,0,25,23.621h0V1.379A1.38,1.38,0,0,0,23.62,0Zm0,0" transform="translate(0 0)" fill="#7d7d7d"/>
<path id="Path_1509" data-name="Path 1509" d="M214.153,98.549V88.881h3.259L217.9,85.1h-3.748v-2.41c0-1.093.3-1.838,1.871-1.838h1.987V77.473a26.7,26.7,0,0,0-2.911-.149c-2.881,0-4.852,1.758-4.852,4.987V85.1H207v3.784h3.247v9.668Zm0,0" transform="translate(-196.893 -73.549)" fill="#131419"/>
</g>
</svg>
</div>
<div class="social-title__inner">
<span class="social-title__count">227k</span>
<h5 class="social-title__title meta-font">Followers</h5>

</div>
</a>
</li>
<li>
<a href="#" class="social-title social-facebook">
<div class="social-title__icon">
<svg id="youtube" xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25">
<rect id="Rectangle_1551" data-name="Rectangle 1551" width="25" height="25" rx="1" fill="#7d7d7d"/>
<g id="Group_19406" data-name="Group 19406" transform="translate(5.056 3.46)">
<path id="Path_1504" data-name="Path 1504" d="M101.545,213.838a.788.788,0,0,0-.063-.278.3.3,0,0,0-.269-.184.468.468,0,0,0-.367.138.244.244,0,0,0-.061.092l0,2.961v.073l.029.038a.588.588,0,0,0,.313.193.3.3,0,0,0,.4-.24.719.719,0,0,0,.016-.149C101.548,215.6,101.549,214.719,101.545,213.838Zm0,0a.788.788,0,0,0-.063-.278.3.3,0,0,0-.269-.184.468.468,0,0,0-.367.138.244.244,0,0,0-.061.092l0,2.961v.073l.029.038a.588.588,0,0,0,.313.193.3.3,0,0,0,.4-.24.719.719,0,0,0,.016-.149C101.548,215.6,101.549,214.719,101.545,213.838Zm3.315-4.465q-5.256-.113-10.513,0a2.236,2.236,0,0,0-2.188,2.236v5.473a2.236,2.236,0,0,0,2.188,2.237q5.256.113,10.513,0a2.236,2.236,0,0,0,2.188-2.237v-5.473A2.236,2.236,0,0,0,104.86,209.373Zm-9.484,8.207h-1.01v-5.712H93.319v-.956h3.1v.953H95.376Zm3.616-2.371v2.371H98.1v-.542l-.067.072a1.641,1.641,0,0,1-.69.494.837.837,0,0,1-.419.038.515.515,0,0,1-.405-.323,1.252,1.252,0,0,1-.093-.516c0-.653,0-4.108,0-4.141h.893c0,.03,0,2.51.005,3.72a.989.989,0,0,0,.014.2.218.218,0,0,0,.314.175.976.976,0,0,0,.432-.338.156.156,0,0,0,.017-.091v-3.669l.9,0Zm3.4,1.9a.734.734,0,0,1-.761.539,1.011,1.011,0,0,1-.763-.348l-.087-.092v.374h-.9v-6.668h.9v2.195a.9.9,0,0,1,.1-.153,1.029,1.029,0,0,1,.516-.328.777.777,0,0,1,.929.422,1.732,1.732,0,0,1,.143.749q0,1.4,0,2.8A1.635,1.635,0,0,1,102.4,217.107Zm3.311-.188a1.1,1.1,0,0,1-.947.776,1.5,1.5,0,0,1-.855-.087,1.187,1.187,0,0,1-.678-.863,2.6,2.6,0,0,1-.065-.557c-.007-.73,0-1.461,0-2.191a1.475,1.475,0,0,1,.353-1.026,1.3,1.3,0,0,1,1.116-.431,1.563,1.563,0,0,1,.389.071,1.085,1.085,0,0,1,.739.878,2.646,2.646,0,0,1,.049.5c.007.389,0,1.248,0,1.248h-1.716v1.23a.4.4,0,1,0,.8,0v-.632h.922A4.47,4.47,0,0,1,105.706,216.919Zm-.819-3.139a.4.4,0,1,0-.8,0v.691h.8Zm-3.4-.22a.3.3,0,0,0-.269-.184.468.468,0,0,0-.367.138.244.244,0,0,0-.061.092l0,2.961v.073l.029.038a.588.588,0,0,0,.313.193.3.3,0,0,0,.4-.24.719.719,0,0,0,.016-.149c0-.882,0-1.763,0-2.644A.788.788,0,0,0,101.482,213.56Z" transform="translate(-92.159 -201.294)" fill="#131419"/>
<path id="Path_1505" data-name="Path 1505" d="M259.322,94.99v4.951H258.4v-.532c-.1.1-.188.193-.283.277a1.239,1.239,0,0,1-.583.3.582.582,0,0,1-.745-.4,1.307,1.307,0,0,1-.059-.369V94.99h.91v3.775a.852.852,0,0,0,.013.15.207.207,0,0,0,.292.177.978.978,0,0,0,.44-.339.163.163,0,0,0,.014-.092V94.99Z" transform="translate(-247.707 -93.239)" fill="#131419"/>
<path id="Path_1506" data-name="Path 1506" d="M136.974,65.681c-.2-.839-.616-2.611-.616-2.611h-1.044s.8,2.66,1.161,3.846a.473.473,0,0,1,.019.134v2.72h.963V67.05a.473.473,0,0,1,.019-.134c.359-1.186,1.161-3.846,1.161-3.846h-1.044s-.417,1.772-.616,2.611Z" transform="translate(-132.947 -63.07)" fill="#131419"/>
<path id="Path_1507" data-name="Path 1507" d="M196.121,92.731h0a1.313,1.313,0,0,0-1.313,1.313v2.571a1.313,1.313,0,0,0,1.313,1.313h0a1.313,1.313,0,0,0,1.313-1.313V94.044A1.313,1.313,0,0,0,196.121,92.731Zm.379,3.936a.379.379,0,1,1-.758,0V93.993a.379.379,0,1,1,.758,0Z" transform="translate(-189.177 -91.104)" fill="#131419"/>
</g>
</svg>
</div>
<div class="social-title__inner">
<span class="social-title__count">227k</span>
<h5 class="social-title__title meta-font">Followers</h5>
</div>
</a>
</li>
<li>
<a href="#" class="social-title social-facebook">
<div class="social-title__icon">
<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25">
<g id="Group_19409" data-name="Group 19409" transform="translate(-96 -723)">
<path id="linkedin" d="M23.2,0H1.8A1.8,1.8,0,0,0,0,1.8V23.2A1.8,1.8,0,0,0,1.8,25H23.2A1.8,1.8,0,0,0,25,23.2V1.8A1.8,1.8,0,0,0,23.2,0ZM8.868,18.9H5.823V9.738H8.868ZM7.346,8.487h-.02a1.587,1.587,0,1,1,.04-3.165,1.587,1.587,0,1,1-.02,3.165Zm12.5,10.41H16.8V14c0-1.231-.441-2.071-1.542-2.071A1.667,1.667,0,0,0,13.7,13.039a2.085,2.085,0,0,0-.1.743V18.9H10.553s.04-8.3,0-9.159H13.6v1.3A3.022,3.022,0,0,1,16.34,9.523c2,0,3.5,1.309,3.5,4.122Zm0,0" transform="translate(96 723)" fill="#7d7d7d"/>
</g>
</svg>

</div>
<div class="social-title__inner">
<span class="social-title__count">227k</span>
<h5 class="social-title__title meta-font">Followers</h5>
</div>
</a>
</li>
<li>
<a href="#" class="social-title social-facebook">
<div class="social-title__icon">
<svg id="instagram" xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25">
<path id="Path_1510" data-name="Path 1510" d="M104.916,91H93.2A2.2,2.2,0,0,0,91,93.2v11.719a2.2,2.2,0,0,0,2.2,2.2h11.719a2.2,2.2,0,0,0,2.2-2.2V93.2A2.2,2.2,0,0,0,104.916,91Zm-5.859,13.184a5.127,5.127,0,1,1,5.127-5.127A5.133,5.133,0,0,1,99.057,104.184Zm5.127-8.789a1.465,1.465,0,1,1,1.465-1.465A1.467,1.467,0,0,1,104.184,95.395Zm0,0" transform="translate(-86.557 -86.557)" fill="#7d7d7d"/>
<path id="Path_1511" data-name="Path 1511" d="M184.662,181a3.662,3.662,0,1,0,3.662,3.662A3.666,3.666,0,0,0,184.662,181Zm0,0" transform="translate(-172.162 -172.162)" fill="#7d7d7d"/>
<path id="Path_1512" data-name="Path 1512" d="M21.289,0H3.711A3.751,3.751,0,0,0,0,3.711V21.289A3.751,3.751,0,0,0,3.711,25H21.289A3.751,3.751,0,0,0,25,21.289V3.711A3.751,3.751,0,0,0,21.289,0Zm.732,18.359a3.666,3.666,0,0,1-3.662,3.662H6.641a3.666,3.666,0,0,1-3.662-3.662V6.641A3.666,3.666,0,0,1,6.641,2.979H18.359a3.666,3.666,0,0,1,3.662,3.662Zm0,0" fill="#7d7d7d"/>
</svg>
</div>
<div class="social-title__inner">
<span class="social-title__count">227k</span>
<h5 class="social-title__title meta-font">Followers</h5>
</div>
</a>
</li>
<li>
<a href="#" class="social-title social-facebook">
<div class="social-title__icon">
<svg id="google-plus-logo-on-black-background" xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25">
<g id="post-gplus">
<path id="Path_1513" data-name="Path 1513" d="M11.5,8.625c0-1.25-.75-3.75-2.625-3.75-.75,0-1.625.5-1.625,2.125,0,1.5.75,3.625,2.5,3.625A1.911,1.911,0,0,0,11.5,8.625Zm-.75,6.125h-.375a9.244,9.244,0,0,0-2.25.375A2.276,2.276,0,0,0,6.25,17.25C6.25,18.625,7.5,20,10,20a2.733,2.733,0,0,0,3-2.5C13,16.625,12.375,16,10.75,14.75ZM22.5,0H2.5A2.507,2.507,0,0,0,0,2.5v20A2.507,2.507,0,0,0,2.5,25h20A2.507,2.507,0,0,0,25,22.5V2.5A2.507,2.507,0,0,0,22.5,0ZM8.875,21.5c-3.5,0-5.125-2-5.125-3.75a3.294,3.294,0,0,1,1.875-3A8.357,8.357,0,0,1,9.5,13.625a1.659,1.659,0,0,1-.375-1.25,1.127,1.127,0,0,1,.125-.625h-.5A3.821,3.821,0,0,1,4.75,8c0-2.125,1.625-4.5,5.125-4.5h5.25l-.375.375-.875.875-.125.125h-.875A3.771,3.771,0,0,1,14,7.625,3.74,3.74,0,0,1,12,11a1.052,1.052,0,0,0-.5.875.844.844,0,0,0,.5.75,2.731,2.731,0,0,0,.625.375c1,.75,2.375,1.625,2.375,3.625C15,18.875,13.375,21.5,8.875,21.5Zm12.375-9h-2.5V15H17.5V12.5H15V11.25h2.5V8.75h1.25v2.5h2.5Z" fill="#7d7d7d"/>
</g>
</svg>

</div>
<div class="social-title__inner">
<span class="social-title__count">227k</span>
<h5 class="social-title__title meta-font">Followers</h5>
</div>
</a>
</li>
<li>
<a href="#" class="social-title social-facebook">
<div class="social-title__icon">
<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25">
<path id="twitter" d="M23.2,0H1.8A1.8,1.8,0,0,0,0,1.8V23.2A1.8,1.8,0,0,0,1.8,25H23.2A1.8,1.8,0,0,0,25,23.2V1.8A1.8,1.8,0,0,0,23.2,0Zm-4.99,9.746q.008.185.008.371a8.108,8.108,0,0,1-8.163,8.163h0a8.121,8.121,0,0,1-4.4-1.289,5.835,5.835,0,0,0,.684.04A5.757,5.757,0,0,0,9.9,15.8a2.872,2.872,0,0,1-2.68-1.993,2.86,2.86,0,0,0,1.3-.049,2.87,2.87,0,0,1-2.3-2.812c0-.013,0-.025,0-.037a2.849,2.849,0,0,0,1.3.359,2.872,2.872,0,0,1-.888-3.83,8.146,8.146,0,0,0,5.914,3,2.871,2.871,0,0,1,4.889-2.617,5.755,5.755,0,0,0,1.822-.7,2.88,2.88,0,0,1-1.262,1.587,5.722,5.722,0,0,0,1.648-.452,5.831,5.831,0,0,1-1.431,1.486Zm0,0" transform="translate(0)" fill="#7d7d7d"/>
</svg>


</div>
<div class="social-title__inner">
<span class="social-title__count">227k</span>
<h5 class="social-title__title meta-font">Followers</h5>
</div>
</a>
</li>
</ul>
</div>
</div>
</div>
</div>
</div><!-- .site-content -->

<?php include 'includes/footer.php'; ?>
