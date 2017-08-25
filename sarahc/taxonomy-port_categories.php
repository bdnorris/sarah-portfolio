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
					<script>
						window.ports = [];
					</script>
					<div>
						<ul class="port-grid" id="myGrid">
							<?php
							// The Loop
							$i = 0;
							$stack = array();
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
								array_push($stack, $urlNE);
								?>
								<script>
									window.ports.push('<?php echo $urlNE ?>');
								</script>
					<!--<div class="pieceLink" v-on:click="loadPort('<?php echo $url ?>')">
						<img src="<?php echo $image[0]; ?>" width="<?php echo $image[1]; ?>" height="<?php echo $image[2]; ?>" alt="<?php //the_title(); ?>" class="projectThumb">
						<div class="overlay"><?php //the_title(); ?></div>
					</div>-->
							<a href="<?php echo $urlNE ?>" class="modaal-ajax pieceLink" data-port="<?php echo $i ?>">
								<img src="<?php echo $image[0]; ?>" width="<?php echo $image[1]; ?>" height="<?php echo $image[2]; ?>" alt="<?php //the_title(); ?>" class="projectThumb">
								<div class="overlay">
									<h4><?php the_title(); ?></h4>
								</div>
							</a>

				<?php
					$i++;
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
		<!--<a v-on:click="hidePort" v-show="activated == true" class="cancel"><span><img src="<?php echo get_template_directory_uri(); ?>/img/x.png"></span></a>-->
		<!--<div id="port-container" v-html="content"></div>-->
		<div id="port-container">
			<button type="button" name="close" class="button close">
				<svg width="14px" height="14px" viewBox="0 0 14 14" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
				    <!-- Generator: Sketch 46.2 (44496) - http://www.bohemiancoding.com/sketch -->
				    <desc>Created with Sketch.</desc>
				    <defs></defs>
				    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
				        <g id="Close" transform="translate(-51.000000, -47.000000)" fill="#D8D8D8">
				            <path d="M57.7175144,51.5961941 L53.1213203,47 L51,49.1213203 L55.5961941,53.7175144 L51,58.3137085 L53.1213203,60.4350288 L57.7175144,55.8388348 L62.3137085,60.4350288 L64.4350288,58.3137085 L59.8388348,53.7175144 L64.4350288,49.1213203 L62.3137085,47 L57.7175144,51.5961941 Z" id="Combined-Shape"></path>
				        </g>
				    </g>
				</svg>
			</button>
			<button type="button" name="previous" class="button previous direction" data-page="" data-port="">
				<svg width="9px" height="14px" viewBox="0 0 9 14" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
				    <!-- Generator: Sketch 46.2 (44496) - http://www.bohemiancoding.com/sketch -->
				    <desc>Created with Sketch.</desc>
				    <defs></defs>
				    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
				        <g id="Chevrons" transform="translate(-55.000000, -5.000000)" fill="#D8D8D8">
				            <path d="M59.4194174,16.1369318 L61.7175144,18.4350288 L63.8388348,16.3137085 L59.2426407,11.7175144 L63.8388348,7.12132034 L61.7175144,5 L55,11.7175144 L59.4194174,16.1369318 Z" id="Combined-Shape"></path>
				        </g>
				    </g>
				</svg>
			</button>
			<div id="port-container-content">
			</div>
			<div class="spinner" id="ajax-loader"><div class="bounce1"></div><div class="bounce2"></div><div class="bounce3"></div></div>
			<button type="button" name="next" class="button next direction" data-page="" data-port="">
				<svg width="9px" height="14px" viewBox="0 0 9 14" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
				    <!-- Generator: Sketch 46.2 (44496) - http://www.bohemiancoding.com/sketch -->
				    <desc>Created with Sketch.</desc>
				    <defs></defs>
				    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
				        <g id="Chevrons" transform="translate(-55.000000, -25.000000)" fill="#D8D8D8">
				            <path d="M59.4194174,36.1369318 L61.7175144,38.4350288 L63.8388348,36.3137085 L59.2426407,31.7175144 L63.8388348,27.1213203 L61.7175144,25 L55,31.7175144 L59.4194174,36.1369318 Z" id="Combined-Shape-Copy" transform="translate(59.419417, 31.717514) scale(-1, 1) translate(-59.419417, -31.717514) "></path>
				        </g>
				    </g>
				</svg>
			</button>
		</div>
	</section><!-- #primary -->



<?php //get_sidebar(); ?>
<?php get_footer(); ?>
