let filmHtmlTemplate = $('#templateHtml');
let showFilmsElement = $('#content-movie');

$(document).ready(function() {
    loadFull();
});

function appendData(items, filmHtmlTemplate, showFilmsElement) {
	if (items.length > 0) {
		$.each(items, (index, value) => {
			let htmlMore = filmHtmlTemplate.html();
			htmlMore = htmlMore.replace(/{id}/g, value.id);
			htmlMore = htmlMore.replace(/{image}/g, value.image);
			htmlMore = htmlMore.replace(/{title}/g, value.title);
			htmlMore = htmlMore.replace(/{description}/g, value.description);
			showFilmsElement.append(htmlMore);
		});
	}
}

function loadFull() {
	$.ajax({
		url		: 'tooltip.php',
		data	: {
			type: 'load-full'
		},
		type	: 'GET',
		dataType: 'json',
	}).done(function(data){
		appendData(data, filmHtmlTemplate, showFilmsElement);
	}).done(function() {
        $('.tooltip-custom').tooltipster({
            plugins: ['follower'],
            functionBefore: function(instance, helper) {
                instance.content('My new content');
            }
        });
    })
}
