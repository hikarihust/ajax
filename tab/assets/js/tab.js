let filmHtmlTemplate = $('#templateHtml');
let showFilmsElement = $('.content-movie');
let categoryId = 1;


$(document).ready(function(){
    loadData(categoryId);
});

function loadData(categoryId) {
	$.ajax({
		url		: 'tab.php',
		data	: {
		type: 'load-data', 
		id: categoryId
		},
		type	: 'GET',
		dataType: 'json'
	}).done(function(data){
		appendData(data, filmHtmlTemplate, showFilmsElement);
	});
}

function appendData(items, filmHtmlTemplate, showFilmsElement) {
	if (items.length > 0) {
		showFilmsElement.empty();
		$.each(items, (index, value) => {
			var htmlMore = filmHtmlTemplate.html();
			htmlMore = htmlMore.replace(/{image}/g, value.image);
			htmlMore = htmlMore.replace(/{title}/g, value.title);
			htmlMore = htmlMore.replace(/{description}/g, value.description);
			showFilmsElement.append(htmlMore);
		});
	}
}
