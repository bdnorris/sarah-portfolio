<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package _sarahc
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<?php do_action( 'before' ); ?>

	<?php
		if (is_page( 'landing-page' )) {
		}
		else {
	?>
	<!--<img src='<?php echo get_template_directory_uri(); ?>/img/ajax-loader.gif' id='ajax-loader'>-->
  <div class="spinner" id="ajax-loader">
  <div class="bounce1"></div>
  <div class="bounce2"></div>
  <div class="bounce3"></div>
</div>
	<header id="masthead" class="site-header" role="banner">
		<div class="row">
		  <div class="small-12 small-centered columns">
			  <div class="row">
			  	<div class="small-12 medium-8 large-6 small-centered columns">
				  <div class="site-branding">
                	<h1 class="site-title">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<img src="<?php echo get_template_directory_uri(); ?>/img/sarah-carney.png" alt="Sarah Carney">
						</a>
					</h1>
					<h3><?php echo get_bloginfo( 'description', 'display' ); ?></h3>
            	  </div>
				</div>
			  </div>

            <nav id="site-navigation" class="main-navigation" role="navigation">
                <h1 class="menu-toggle"><?php _e( 'Menu', 'sarahc' ); ?></h1>
                <a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'sarahc' ); ?></a>

                <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
            </nav><!-- #site-navigation -->
        </div>
        </div>

	</header><!-- #masthead -->

	<?php
		}
	?>

	<div id="content" class="site-content">
