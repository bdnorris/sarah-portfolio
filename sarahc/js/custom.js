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
		/*
		$pieceLinks.each(function() {

			jQuery(this).attr("href", "#" + this.pathname);

		}).click(function() {
				$ajaxSpinner.fadeIn();
				jQuery(".portfolio").fadeOut();
				$el = jQuery(this);
				$URL = $el.attr('href').substring(1);
				$URL = $URL + " #main";

				jQuery('#port-container').load($URL + " .entry-content", function() {
  				// stuff to do when content is ready
					$ajaxSpinner.fadeOut();
					jQuery(".portfolio").fadeIn("300");
				});

		});*/

		new Vue({
		 el: '#app',
		 data: {
		   content: '',
			 activated: false
		 },
		 methods: {
			 loadPort: function(myUrl) {
				 $ajaxSpinner.fadeIn();
				 //Vue.set(this.data.text = "goodbye world!");
				 var myUrl = atob(myUrl);
				 var self = this;
				 jQuery.ajax({
             url: myUrl,
             method: 'GET',
             success: function (data) {
							$ajaxSpinner.fadeOut();
							//data = jQuery(data).contents('.entry-content');
							self.content = data;
							self.showPort();
             },
             error: function (error) {
                 alert(JSON.stringify(error));
								 $ajaxSpinner.fadeOut();
             }
         });
			 },
			 showPort: function() {
				 this.activated = true;
				 console.log('showport');
				 jQuery('body').addClass('modal-open');
			 },
			 hidePort: function() {
				 this.activated = false;
				 console.log('hideport');
				 jQuery('body').removeClass('modal-open');
			 }
			}
		});

		jQuery('.noclick').click(function(){
			return false;
		});
		//$practice.load("/landing-page/ #landingWrapper")

	});
//});
