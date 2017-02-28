<?php
/**
 * Template Name: Home Page
 *
 *
 * @package _sarahc
 */

get_header(); ?>


	<?php
		// The Query
		$args = array(
			'post_type' => 'portfolio',
			'posts_per_page' => 16,
            'orderby' => 'rand',
	       'order'   => 'DESC',
			//'people' => 'bob'
		);
		$the_query = new WP_Query( $args );

	?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<div class="row">
		<div class="small-12 columns">
			<ul class="small-block-grid-2 medium-block-grid-3 large-block-grid-4" id="myGrid">
				<?php
				// The Loop
				//$i = 0;
				while ( $the_query->have_posts() ) : $the_query->the_post();
				?>
				<li>
					
				<?php 
					if (has_post_thumbnail( $post->ID ) ):
					$image = wp_get_attachment_image_src(get_post_thumbnail_id( $post->ID ), 'medium' ); 
					//$thumb_id = get_post_thumbnail_id($post->id);
					//$alt = get_post_meta($thumb_id, '_wp_attachment_image_alt', true);
					//echo $alt;
				?>
					<a href="<?php the_permalink(); ?>" class="pieceLink" data-reveal-id="myModal"><div class="overlay">
						<img src="<?php echo $image[0]; ?>" width="<?php echo $image[1]; ?>" height="<?php echo $image[2]; ?>" alt="<?php //the_title(); ?>" data-adaptive-background='1' class="projectThumb">	
						<div class="overlay"><?php //the_title(); ?></div>
					</a>
				<?php 
					endif; 
				?>
				</li>
				<?php
				//$i++;
				endwhile;
				?>
			</ul>
			
			<div id="myModal" class="reveal-modal medium" data-reveal></div>
			
		</div>
		</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
