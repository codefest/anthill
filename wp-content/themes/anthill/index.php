<?php get_header(); ?>
<div class="wrapper">
    <main>
        <!-- PRIMARY ACTION BUTTON -->
        <!-- TODO: this markup needs some work -->
        <span class="submit-resource">
            <a href="#" class="primary button">
                <i class="icon-plus"></i>
                 Submit resource
            </a>
        </span>

        <?php //TODO: put the loop here ?>

        <h1>Use H1 for page titles</h1>
        <h2>Example Tiles:</h2>
         
        <!-- STANDARD IMAGE TILEs -->
        <div class="tiles-list cf">
            <!-- put a multiple .tile boxes in the .tiles-list div. use the loop --> 

            <article class="tile graphic-design hentry TODO: PUT WORDPRESS POST_CLASS HERE">
                <div class="resource-image thumbnail"> <img src="http://placekitten.com/352/198" />
                    <div class="category-icon"> <i class="icon-magic"></i> </div>
                    <div class="popularity"><i class="icon-heart"></i> 9999</div>
                </div>
                <h3>TITLE OF RESOURCE</h3>
                <div class="postmeta"> <span class="username"><a href="#">AUTHOR</a></span> |
                    <time datetime="2012-02-17" class="time-ago">a long time ago</time>
                </div>
            </article>

            <article class="tile graphic-design hentry TODO: PUT WORDPRESS POST_CLASS HERE">
                <div class="resource-image thumbnail"> <img src="http://placekitten.com/352/198" />
                    <div class="category-icon"> <i class="icon-magic"></i> </div>
                    <div class="popularity"><i class="icon-heart"></i> 9999</div>
                </div>
                <h3>TITLE OF RESOURCE</h3>
                <div class="postmeta"> <span class="username"><a href="#">AUTHOR</a></span> |
                    <time datetime="2012-02-17" class="time-ago">a long time ago</time>
                </div>
            </article>
            <article class="tile graphic-design hentry TODO: PUT WORDPRESS POST_CLASS HERE">
                <div class="resource-image thumbnail"> <img src="http://placekitten.com/352/198" />
                    <div class="category-icon"> <i class="icon-magic"></i> </div>
                    <div class="popularity"><i class="icon-heart"></i> 9999</div>
                </div>
                <h3>TITLE OF RESOURCE</h3>
                <div class="postmeta"> <span class="username"><a href="#">AUTHOR</a></span> |
                    <time datetime="2012-02-17" class="time-ago">a long time ago</time>
                </div>
            </article>


        </div>
        <!-- search div is just here as a stand-in for body_class.  -->
        <div class="search">
            <h2>Search Results:</h2>
                <!-- ONE SEARCH RESULT -->
                <article class="slab graphic-design hentry TODO: PUT WORDPRESS POST_CLASS HERE">
                    <div class="resource-image thumbnail"> <img src="http://placekitten.com/352/198" />
                        <div class="category-icon"> <i class="icon-magic"></i> </div>
                        <div class="popularity"><i class="icon-heart"></i> 9999</div>
                    </div>
                    <h3>TITLE OF RESOURCE</h3>
                    <p>Short description of resource</p>
                    TAGS
                    <div class="postmeta"> <span class="username"> <a href="#">AUTHOR</a></span> |
                        <time datetime="2012-02-17" class="time-ago">a long time ago</time>
                    </div>
                </article>
        </div>
    </main>
    <aside>
        <nav>
            <ul class="category-nav">
                <!-- TODO: in no particular order, list all the categories. (custom menu? custom walker?) -->
                <li class="3d"><a href="#"><div class="category-icon"><i class="icon-magic"></i></div> 3d</a></li>
                <li class="typography"><a href="#"><div class="category-icon"><i class="icon-magic"></i></div> Typography</a></li>
                <li class="web"><a href="#"><div class="category-icon"><i class="icon-magic"></i></div> Web</a></li>
                <li class="graphic-design"><a href="#"><div class="category-icon"><i class="icon-magic"></i></div> Graphic Design</a></li>
                <li class="photography"><a href="#"><div class="category-icon"><i class="icon-magic"></i></div> Photography</a></li>
                <li class="video"><a href="#"><div class="category-icon"><i class="icon-magic"></i></div> Video</a></li>
            </ul>
        <nav>
    </aside>
</div> <!-- close .wrapper -->
<?php get_footer(); ?>
