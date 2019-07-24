function skrollrInfinite() {
	/* Sets the initial state when Jetpack Infinite Scroll is active */
	
	// Initialize this script
	var htmlTag = document.documentElement;
	var bodyTag = document.body;
	var infiniteScrollLoaded = document.head.querySelector( '#the-neverending-homepage-css' );
	
	if ( bodyTag.classList.contains( 'skrollr-animate' ) ) {
		bodyTag.setAttribute( 'id', 'skrollr-body' );
		
		var getSkrollr = skrollr.get();
		var isMobile = /Mobi|Android/i.test(navigator.userAgent);
		
		if ( infiniteScrollLoaded && isMobile ) {
			bodyTag.removeAttribute( 'id' );
			bodyTag.setAttribute('style', 'touch-action: auto;');
			skrollr.init().destroy();
			//console.log('Infinite Scroll loaded; On mobile');
		} else if ( infiniteScrollLoaded && !isMobile ) {
			bodyTag.setAttribute('style', 'touch-action: none;');
			//console.log('Infinite Scroll loaded; Not on mobile');
		} else {
			return;
		}
	}
}
document.addEventListener( 'DOMContentLoaded', skrollrInfinite );