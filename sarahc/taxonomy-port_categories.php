<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package _sarahc
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
<div class="row">
		<div class="small-12 columns">
						<header class="page-header">
				<h1 class="page-title">
					<?php
					$queried_object = get_queried_object();
					$term_id = $queried_object->term_id;
					$term = get_term($term_id, 'port_categories');
					$theSlug = $term->slug;
					$theName = $term->name;
					echo $theName;
					?>
				</h1>

			</header><!-- .page-header -->

	<?php
		// The Query
		$args = array(
			'post_type' => 'portfolio',
			'port_categories' => $theSlug,
			'posts_per_page' => -1

		);
		$the_query = new WP_Query( $args );

	?>
<div >
			<ul class="small-block-grid-2 medium-block-grid-3 large-block-grid-4" id="myGrid">
				<?php
				// The Loop
				//$i = 0;
				while ( $the_query->have_posts() ) : $the_query->the_post();
				?>
				<li>

				<?php
					if (has_post_thumbnail( $post->ID ) ) : $image = wp_get_attachment_image_src(get_post_thumbnail_id( $post->ID ), 'medium' );
					//$thumb_id = get_post_thumbnail_id($post->id);
					//$alt = get_post_meta($thumb_id, '_wp_attachment_image_alt', true);
					//echo $alt;
					$id = $post->ID;
					$url = base64_encode(get_permalink( $id ));
					$urlNE = get_permalink( $id );
				?>
					<div class="pieceLink" v-on:click="loadPort('<?php echo $url ?>')">
						<img src="<?php echo $image[0]; ?>" width="<?php echo $image[1]; ?>" height="<?php echo $image[2]; ?>" alt="<?php //the_title(); ?>" class="projectThumb">
						<div class="overlay"><?php //the_title(); ?></div>
					</div>
					<a href="<?php echo $urlNE ?>" class="modaal-ajax">Show</a>
				<?php
					endif;
				?>

				</li>
				<?php
				//$i++;
				endwhile;
				?>
			</ul>


</div>

</div></div>
		</main><!-- #main -->
		<!--<div id="myModal" class="reveal-modal medium" data-reveal></div>-->
		<a v-on:click="hidePort" v-show="activated == true" class="cancel"><span><img src="<?php echo get_template_directory_uri(); ?>/img/x.png"></span></a>
		<div id="port-container" v-html="content"></div>
	</section><!-- #primary -->



<?php //get_sidebar(); ?>
<?php get_footer(); ?>
