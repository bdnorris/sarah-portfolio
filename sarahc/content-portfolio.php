<?php
/**
 * @package _sarahc
 */
?>
<div class="row"><div class="small-12 columns">
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<!--<header class="entry-header">
		<h1 class="entry-title"><?php //the_title(); ?></h1>
	</header>--><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'sarahc' ),
				'after'  => '</div>',
			) );
		?>

	<?php
		$thumb_ID = get_post_thumbnail_id( $post->ID );
		$args = array(
			'post_type' => 'attachment',
			'post_mime_type' => 'image',
			//'numberposts' => 1,
			'orderby' => 'menu_order',
			'order' => 'ASC',
			'post_parent' => $post->ID,
			'exclude' => $thumb_ID,
		);
		$images = get_posts($args);
		//print_r ($images);
	?>

        <ul style="" class="portImages">
            <?php
        	foreach( $images as $image ) {
				echo "<li>";
				$aMeta = wp_get_attachment_image_src( $image->ID, 'full' );
				echo "<img src='" . wp_get_attachment_url($image->ID) . "' height='" . $aMeta[2] . "' width='" . $aMeta[1] . "'>";

				echo "</li>";
            }
            ?>
        </ul>

	</div><!-- .entry-content -->


</article><!-- #post-## -->
	</div></div>
