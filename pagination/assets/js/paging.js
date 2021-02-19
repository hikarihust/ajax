let ITEM_PER_PAGE = 3;
let currentPage = 1;
let filmHtmlTemplate = $('#templateHtml');
let showFilmsElement = $('.content-movie');


$(document).ready(function(){
	loadData();
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

function loadData(){
	$.ajax({
		url		: 'pagination_ajax.php',
		data	: {
			type: 'list', 
			offset: (currentPage-1) * ITEM_PER_PAGE,
			limit: ITEM_PER_PAGE
		},
		type	: 'GET',
		dataType: 'json'
	}).done(function(data){
		appendData(data.items, filmHtmlTemplate, showFilmsElement);
	});
}
