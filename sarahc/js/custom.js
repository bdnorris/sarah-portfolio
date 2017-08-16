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

		var myModal = jQuery("#myModal"),
		siteURL = "http://" + top.location.host.toString(),
		pieceLinks = jQuery('.pieceLink'),
		hash = window.location.hash,
		$URL = '',
		ajaxSpinner = jQuery("#ajax-loader"),
		pageNum = 0,
		el,
		allLinks = jQuery("a");

		ajaxSpinner.hide();

		//put the onclick even on this thing

		pieceLinks.each(function() {

			jQuery(this).attr("href", "#" + this.pathname);

		}).click(function() {
			//console.log('hello');
			ajaxSpinner.fadeIn();
			jQuery(".portfolio").fadeOut();
			el = jQuery(this);
			$URL = el.attr('href').substring(1);
			$URL = $URL + "#main";
			pageNum = jQuery(this).attr('data-port');
			pageNum = parseInt(pageNum);
			var prev = pageNum - 1;
			var next = pageNum + 1;
			var range = window.ports.length;
			//console.log(range);
			//console.log(prev + ' ' + pageNum + ' ' + next);

			jQuery('#port-container-content').load($URL + " .entry-content", function() {
				// stuff to do when content is ready
				loadInstructions(prev, next, range, 'gallery-click');
			});

		});

		jQuery(document).on('click', '#port-container .direction', function() {
			var a = jQuery(this).attr('data-page');
			var b = jQuery(this);

			//console.log(a + ' ' + b);
			ajaxSpinner.fadeIn();
			jQuery('#port-container-content').addClass('transition');
			//el = jQuery(this);
			//$URL = el.attr('data-page').substring(1);
			$URL = a;
			$URL = $URL + "#main";
			//console.log($URL);
			pageNum = b.attr('data-port');
			pageNum = parseInt(pageNum);
			var prev = pageNum - 1;
			var next = pageNum + 1;
			var range = window.ports.length;
			//console.log(prev + ' ' + pageNum + ' ' + next);

			jQuery('#port-container-content').load($URL + " .entry-content", function() {
				// stuff to do when content is ready
				loadInstructions(prev, next, range, 'prev-next-click');
			});
		});

		jQuery(document).on('click', '.close', function() {
			jQuery('#port-container').removeClass('open');
		});



		function loadInstructions(prev, next, range, whichClick) {
			console.log(prev + ' ' + next + ' ' + range + ' ' + whichClick);
			ajaxSpinner.fadeOut();
			if(whichClick == 'gallery-click') {
				jQuery("#port-container").addClass("open");
			}
			else if (whichClick == 'prev-next-click') {
				jQuery("#port-container-content").removeClass("transition");
			}
			//console.log(pageNum);
			if(prev < 0) {
				jQuery('#port-container .previous').hide();
			}
			else {
				jQuery('#port-container .previous').show().attr('data-page', window.ports[prev]).attr('data-port', [prev]);
			}
			if(next >= range) {
				jQuery('#port-container .next').hide();
			}
			else {
				jQuery('#port-container .next').show().attr('data-page', window.ports[next]).attr('data-port', [next]);
			}
		}

/*
		new Vue({
		 el: '#primary',
		 data: {
		   content: '',
			 activated: false
		 },
		 methods: {
			 loadPort: function(myUrl) {
				 /*$ajaxSpinner.fadeIn();
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
			 loadPortAPI: function() {

			 },
			 showPort: function() {
				 this.activated = true;
				 console.log('showport');
				 jQuery('#port-container').addClass('open');
			 },
			 hidePort: function() {
				 this.activated = false;
				 console.log('hideport');
				 jQuery('#port-container').removeClass('open');
			 }
			}
		});
*/
		/*jQuery('.modaal-ajax').modaal({
		    type: 'ajax',
				fullscreen: true,
				//loading_content: 'Loading &hellip'
		});*/

		jQuery('.noclick').click(function(){
			return false;
		});
		//$practice.load("/landing-page/ #landingWrapper")

	});
//});
