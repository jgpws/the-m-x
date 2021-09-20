function skrollrInit() {
	/* Sets the initial state for Skrollr in mobile, including when Jetpack Infinite Scroll is active */

	// Initialize this script
	var htmlTag = document.documentElement;
	var bodyTag = document.body;
	var infiniteScrollLoaded = document.head.querySelector( '#the-neverending-homepage-css' );
	var isMobile = htmlTag.classList.contains( 'skrollr-mobile' );

	if ( bodyTag.classList.contains( 'skrollr-animate' ) ) {
		var getSkrollr = skrollr.get();

		if ( isMobile ) {
			if ( 'scrollRestoration' in history ) {
				history.scrollRestoration = 'manual';
			}
		} else {
			if ( 'scrollRestoration' in history ) {
				history.scrollRestoration = 'auto';
			}
		}

		if ( infiniteScrollLoaded && isMobile ) {
			bodyTag.removeAttribute( 'id' );
			bodyTag.setAttribute('style', 'touch-action: auto;');
			skrollr.init().destroy();
			//console.log('Infinite Scroll loaded; On mobile');
		}
	}
}
document.addEventListener( 'DOMContentLoaded', skrollrInit );
