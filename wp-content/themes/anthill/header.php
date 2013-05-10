<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <header> closes
 *
 * @package WordPress
 * @subpackage Anthill
 * @since Anthill 0.1
 */
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>
	<?php //@TODO  beef this up for SEO
	bloginfo( 'name' ); ?>
	</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_directory' ); ?>/css/normalize.min.css">
	<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_directory' ); ?>/css/font-awesome.min.css">
	<?php wp_head(); ?>
	<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>">
	

	<link rel="shortcut icon" href="<?php echo site_url(); ?>/favicon.ico" />
</head>
<body <?php body_class(); ?>>
<!--[if lt IE 7]>
<p class="chromeframe alert">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
<![endif]-->

<header> 
	<!-- @TODO  Home page gets an H1 here, all other pages use H2 -->
	<div class="wrapper">
		<div class="logo alignleft">
			<a href="<?php bloginfo('wpurl'); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/anthill_logo.png" class="the_logo"></a>
			<h2><a href="<?php bloginfo('wpurl'); ?>"><?php bloginfo( 'name' ); ?></a></h2>
			<h3><?php  bloginfo( 'description' ); ?></h3>
		</div>
	</div>
	<ul class="utilities">
		<?php 
		// @TODO: temporary quickie nav, switch to menu system
		wp_list_pages( array(
		'depth' => 1,
		'title_li' => '',
		 ) ) ?>
		<li><a href="#">Sign Up</a></li>
		<li><a href="#">Log in</a></li>
	</ul>
	<div class="wrapper">
		<?php
		//@TODO   beef up the searchform.php HTML to better match the comps
		get_search_form(); ?>
	</div>
</header>
