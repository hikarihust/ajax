let ITEM_PER_PAGE = 3;
let filmHtmlTemplate = $('#templateHtml');
let showFilmsElement = $('.content-movie');


$(document).ready(function(){
	
})

function appendData(items, filmHtmlTemplate, showFilmsElement) {
	if (items.length > 0) {
		showFilmsElement.empty();
		$.each(items, (index, value) => {
			let htmlMore = filmHtmlTemplate.html();
			htmlMore = htmlMore.replace(/{image}/g, value.image);
			htmlMore = htmlMore.replace(/{title}/g, value.title);
			htmlMore = htmlMore.replace(/{description}/g, value.description);
			showFilmsElement.append(htmlMore);
		});
	}
}