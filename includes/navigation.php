
        <!-- Navigation bar -->
        <nav class="navigation-bar hidden-xs hidden-sm js-sticky-header-holder">
            <div class="navigation-bar__inner flexbox-wrap flexbox-center-y">
                <div class="navigation-bar__section flex-box align-item-center">
                    <div class="header-logo">
                        <a href="index.php">
                            <img src="img/logo.png" alt="File not found" width="130">

                        </a>
                    </div>
                </div>
                <div class="navigation-bar__section navigation-menu-section js-priority-nav">
                    <ul id="menu-main-menu" class="navigation navigation--main navigation--inline">
                        <li class="menu-item-has-children">
                            <a href="#">Home Pages</a>
                            <ul class="sub-menu">
                                <li><a href="index.html">Home 1</a></li>
                                <li><a href="home-2.html">Home 2</a></li>
                                <li><a href="home-3.html">Home 3</a></li>
                            </ul>
                        </li>
                        <li class="menu-item">
                            <a href="./single-1.html">Single</a>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="#">Archive</a>
                            <ul class="sub-menu">
                                <li><a href="category.html">Category</a></li>
                                <li><a href="tags.html">Tags</a></li>
                                <li><a href="author.html">Author</a></li>
                            </ul>
                        </li>

                        <li class="menu-item-has-children">
                            <a href="#">Categories</a>
                            <ul class="sub-menu">
                                <?php

                                //SHOW DATA FROM THE DATABASE
                                $query = "SELECT * FROM categories";
                                $data = mysqli_query($connection, $query);

                                while ($row = mysqli_fetch_assoc($data)) {
                                    $cat_id = $row['cat_id'];
                                    $cat_title = $row['cat_title'];
                                     echo "<li class='menu-item'><a href='category.php?category=$cat_id'>{$cat_title}</a></li>";
                                    }


                                ?>
                            </ul>
                        </li>
                        <li class="menu-item">
                            <a href="contact.html">Contact</a>
                        </li>
                        <li class="menu-item"><a href="admin/index.php">Admin</a></li>
                        <?php 

                        if (isset($_SESSION['user_role'])) {
                            if (isset($_GET['p_id'])) {
                                $the_post_id = $_GET['p_id'];

                                echo "<li class='menu-item'><a href='admin/posts.php?source=edit_post&p_id=$the_post_id'>Edit Post</a></li>";
                            }
                        }


                        ?>
                    </ul>
                </div>
                <div class="navigation-bar__section">
                    <a href="#login-modal" class="navigation-bar__login-btn navigation-bar-btn" data-toggle="modal" data-target="#login-modal"><i class="mdicon mdicon-person"></i></a>
                    <button type="submit" class="navigation-bar-btn js-search-dropdown-toggle"><i class="mdicon mdicon-search"></i></button>
                </div>
            </div><!-- .navigation-bar__inner -->
            <div id="header-search-dropdown" class="header-search-dropdown ajax-search is-in-navbar js-ajax-search">
                <div class="container container--narrow">
                    <?php 

                    //CHECK IF FORM SUBMITED
                    if (isset($_POST['submit'])) {

                        //GRAB DATA FROM THE FORM
                        $search = $_POST['search'];

                        //MAKE QUERY FROM DATABASE
                        $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%'";
                        $search_query = mysqli_query($connection, $query) or die('error querying mysql');

                        if (mysqli_num_rows($search_query) == 0) {
                            //GIVE RESULT NULL
                            echo "<h1 class='post__title'>NO RESULT FOUND</h1>";
                        }



                    }

                    ?>


                    <form class="search-form search-form--horizontal" method="post" action="">
                        <div class="search-form__input-wrap">
                            <input type="text" name="search" class="search-form__input" placeholder="Search" value="">
                        </div>
                        <div class="search-form__submit-wrap">
                            <button type="submit" class="search-form__submit btn btn-primary">Search</button>
                        </div>
                    </form>

                    <div class="search-results">
                        <div class="typing-loader"></div>
                        <div class="search-results__inner"></div>
                    </div>
                </div>
            </div><!-- .header-search-dropdown -->
        </nav><!-- Navigation-bar -->