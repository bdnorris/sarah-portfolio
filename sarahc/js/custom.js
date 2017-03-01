//(function($) {
	jQuery(document).ready(function(){

		jQuery('#cFormButton').click(function() {

			jQuery("#formContainer").slideToggle("slow", function() {
				//jQuery( "#cFormButton" ).animate({ "left": "-=5em" }, "slow" );
				//jQuery("#cFormButton").toggleClass('small-centered', 1500);
			});
			//return false;
		});


		//ajax

		var $myModal = jQuery("#myModal"),
		 $siteURL = "http://" + top.location.host.toString(),
		 $pieceLinks = jQuery('.pieceLink'),
			hash = window.location.hash,
			$URL = '',
			$ajaxSpinner = jQuery("#ajax-loader"),
			$el, $allLinks = jQuery("a");

		$ajaxSpinner.hide();

		//put the onclick even on this thing
		$pieceLinks.each(function() {

			jQuery(this).attr("href", "#" + this.pathname);

		}).click(function() {
				$ajaxSpinner.fadeIn();
				jQuery(".portfolio").fadeOut();
				$el = jQuery(this);
				$URL = $el.attr('href').substring(1);
				$URL = $URL + " #main";
				/*jQuery.ajax({
				  url: $URL,
				  beforeSend: function( xhr ) {
				    xhr.overrideMimeType( "text/plain; charset=x-user-defined" );
				  }
				})
			  .done(function( data ) {
			    if ( console && console.log ) {
			      //console.log( "Sample of data:", data.slice( 0, 100 ) );
						console.dir(data);
						jQuery('#port-container').html(data);
			    }
			  });*/
				//alert($URL);
				/*$myModal.load($URL, function() {
					$ajaxSpinner.fadeOut();
					jQuery(".portfolio").fadeIn("300");
					//jQuery('a.reveal-link').trigger('click');
					jQuery(document).foundation();
				});*/
				jQuery('#port-container').load($URL + " .entry-content", function() {
  				// stuff to do when content is ready
					$ajaxSpinner.fadeOut();
					jQuery(".portfolio").fadeIn("300");
				});

		});

		jQuery('.noclick').click(function(){
			return false;
		});
		//$practice.load("/landing-page/ #landingWrapper")

	});
//});
