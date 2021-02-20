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
            contentAsHTML: true,
            interactive: true,
            functionBefore: function(instance, helper) {
                let id = instance._$origin[0].id;
                $.ajax({
                    url		: 'tooltip.php',
                    data	: {
                        type: 'load-one',
                        id : id
                    },
                    type	: 'GET',
                    dataType: 'json',
                    async: false
                }).done(function(data){
                    let content =    '<div>Name:   '+ data.title +'</div>';
                        content +=    '<div>Type:   '+ data.category_name +'</div>';
                        content +=    '<div>Actor:  '+ data.actor_name +'</div>';
                        content +=    '<div>Release Date: '+ data.description +'</div>';
                        content +=    '<div>Detail Type: '+ data.category_description +'</div>';
                        $('#demo-position-content').html(content);
                        instance.content($('#demo-position-content').html());
                })
            }
        });
    })
}
