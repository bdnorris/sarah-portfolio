<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package _sarahc
 */
?>

	</div><!-- #content -->
	<?php
		if (is_page( 'landing-page' ) || is_singular( 'portfolio' )) {
		}
		else {
	?>
	<div class="row">
		<div class="small-12 small-centered columns">
		<footer id="colophon" class="site-footer" role="contentinfo">
			<div class="site-info">
				<p>All works &copy; Sarah Carney <?php date("Y") ?>.</p>
				<p>Please do not reproduce without the expressed written consent of Sarah Carney.</p>
			</div><!-- .site-info -->
		</footer><!-- #colophon -->
		</div>
	</div>
	<?php
		}
	?>
</div><!-- #page -->

<?php wp_footer(); ?>
    <script>
      //jQuery(document).foundation();
/*
	jQuery(document).ready(function(){
  		var defaults      = {
  		selector:             '[data-adaptive-background="1"]',
			  parent:               null,
			  normalizeTextColor:   false,
			  normalizedTextColors:  {
			    light:      "#fff",
			    dark:       "#000"
			  },
			  lumaClasses:  {
			    light:      "ab-light",
			    dark:       "ab-dark"
			  }
			};
jQuery.adaptiveBackground.run(defaults)


	});*/
    </script>
</body>
</html>
