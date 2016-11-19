$(document).ready(() => {
	const $container = $('.masonry-container');
	$container.imagesLoaded( () => {
		$container.masonry({
			columnWidth: '.item',
			itemSelector: '.item'
		});
	});
});