/**
 *  Scroll function courtesy of Scott Dowding; http://stackoverflow.com/questions/487073/check-if-element-is-visible-after-scrolling
 *
 * @package sample_wp_functionality
 **/

jQuery( document ).ready(
	function ($) {
		// Check if element is scrolled into view.
		function isScrolledIntoView(elem) {
			var docViewTop    = $( window ).scrollTop();
			var docViewBottom = docViewTop + $( window ).height();

			var elemTop    = $( elem ).offset().top;
			var elemBottom = elemTop + $( elem ).height();

			return ((elemBottom <= docViewBottom) && (elemTop >= docViewTop));
		}

		// If element is scrolled into view, fade it in.
		$( window ).scroll(
			function () {
				$( '.full-access-animation.animate__animated' ).each(
					function () {
						if (isScrolledIntoView( this ) === true) {
							$( this ).addClass( 'animate__fadeInRight' );
						}
					}
				);
			}
		);
	}
);
