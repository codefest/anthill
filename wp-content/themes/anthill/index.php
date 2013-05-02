<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
 <meta charset="<?php bloginfo( 'charset' ); ?>" />
 <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
 <title>
 <?php //TODO: beef this up for SEO
 bloginfo( 'name' ); ?>
</title>
 <meta name="description" content="">
 <meta name="viewport" content="width=device-width">

 <link rel="stylesheet" href="<?php bloginfo( 'stylesheet_directory' ); ?>/css/normalize.min.css">
 <link rel="stylesheet" href="<?php bloginfo( 'stylesheet_directory' ); ?>/css/font-awesome.min.css">

 <link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>">

 <script src="<?php bloginfo( 'stylesheet_directory' ); ?>/js/vendor/modernizr-2.6.2.min.js"></script>
</head>
<body>
        <!--[if lt IE 7]>
            <p class="chromeframe alert">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
            <![endif]-->

            <header>
              <!-- Home page gets an H1 here, all other pages use H2 -->
              <h2><a href="/">Anthill</a></h2>
              <h3>Subheading</h3>

              <ul class="utility">
               <li><a href="#">Sign Up</a></li>
               <li><a href="#">Log in</a></li>
          </ul>

      <?php get_search_form(); ?>          

 </header>

 <main>
     <h1>If the page needs a content heading, use an h1</h1>
     <a href="#" class="primary button"><i class="icon-plus"></i> Submit resource</a>
<!-- STANDARD IMAGE TILE -->
     <div class="tiles cf">
          
          <article class="tile graphic-design hentry TODO: PUT WORDPRESS POST_CLASS HERE">
               <div class="resource-image thumbnail">
                    <img src="http://placekitten.com/352/198" />
                    <div class="category-icon">
                         <i class="icon-magic"></i>
                    </div>
                    <div class="popularity"><i class="icon-heart"></i> 9999</div>
               </div>   
               <h3>TITLE OF WORK</h3>
               <span class="username"><a href="#">AUTHOR</a></span> | <time datetime="2012-02-17" class="time-ago">a long time ago</time>
          </article>

          <!-- put a bunch of tiles in the tiles div -->
     </div>

<!-- ONE SEARCH RESULT -->
          <article class="slab graphic-design hentry TODO: PUT WORDPRESS POST_CLASS HERE">
               <div class="resource-image thumbnail">
                    <img src="http://placekitten.com/352/198" />
                    <div class="category-icon">
                         <i class="icon-magic"></i>
                    </div>
                    <div class="popularity"><i class="icon-heart"></i> 9999</div>
               </div>   
               <h3>TITLE OF WORK</h3>
               <span class="username"><a href="#">AUTHOR</a></span> | <time datetime="2012-02-17" class="time-ago">a long time ago</time>
          </article>


</main>
<aside>
<ul class="category-nav">
  <!-- TODO: in no particular order, list all the categories. (custom menu? custom walker?) -->
  <li class="3d"><a href="#"><i class="icon-magic"></i> 3d</a></li>
  <li class="typography"><a href="#"><i class="icon-magic"></i> Typography</a></li>
  <li class="web"><a href="#"><i class="icon-magic"></i> Web</a></li>
  <li class="graphic-design"><a href="#"><i class="icon-magic"></i> Graphic Design</a></li>
  <li class="photography"><a href="#"><i class="icon-magic"></i> Photography</a></li>
  <li class="video"><a href="#"><i class="icon-magic"></i> Video</a></li>
</ul>
</aside>
<footer>footer stuff goes here</footer>





<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.9.1.min.js"><\/script>')</script>

<script src="js/plugins.js"></script>
<script src="js/main.js"></script>

<script>
var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
    g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
    s.parentNode.insertBefore(g,s)}(document,'script'));
</script>
</body>
</html>
