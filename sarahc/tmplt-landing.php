<?php
/**
 * Template Name: Landing Page
 *
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<div class="row">
				<div class="small-12 medium-8 large-6 small-centered columns">
					<div id="landingWrapper">
						<img src="<?php echo get_template_directory_uri(); ?>/img/sarah-carney.png" alt="Sarah Carney">
						<h3>A new website is coming soon.</h3>
						<p>Until then, why don&rsquo;t we get in touch?</p>
						<ul class="small-block-grid-6" id="social">
							<li></li>
							<li></li>
							<li ><a id="pinterest" href="http://www.pinterest.com/sarahruthc/" title="Pinterest"><span class="entypo-pinterest-circled"></span></a></li>
							<li><a id="linkedin" href="https://www.linkedin.com/profile/view?trk=contacts-contacts-list-contact_name-0&id=81621822" title="LinkedIn"><span class="entypo-linkedin-circled"></span></a></li>
							<li></li>
							<li></li>
						</ul>
						<div id="contactForm" class="row">
							<div class="small-centered small-12 medium-10 large-8 columns">
								<div id="cFormButton" class="">Send me a note</div>
								<div id="formContainer" class="">
									<?php echo do_shortcode( '[contact-form-7 id="12" title="Landing Page Contact Form"]' ); ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
