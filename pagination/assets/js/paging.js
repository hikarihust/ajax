let ITEM_PER_PAGE = 3;
let currentPage = 1;
let totalItems = 0;
let totalPages = 0;
let filmHtmlTemplate = $('#templateHtml');
let showFilmsElement = $('.content-movie');


$(document).ready(function(){
    init();
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

function init() { 
	$.ajax({
		url		: 'pagination_ajax.php',
		data	: {
			type: 'count', 
			items: ITEM_PER_PAGE
		},
		type	: 'GET',
		dataType: 'json'
	}).done(function(data){
		totalPages = data.totalPages;
		totalItems = data.totalItems;
        setPageInfo()
        setSelectPageOptions()
	});
}

function setSelectPageOptions() {
	for (var i = 1; i <= totalPages; i++) {
		if (i != currentPage) {
			$('#slbPages').append('<option value="' + i + '">Page ' + (i) +'</option>');
		} else {
			$('#slbPages').append('<option selected="selected" value="' + i + '">Page ' + (i ) +'</option>');
		}
	}
}

function setPageInfo(){
	$('.pageInfo').text('Page ' + (currentPage) + ' of ' + totalPages);
	
	$('#slbPages').val(currentPage);
	
	if (currentPage == 1) {
		$('.goStart').attr('disabled','disabled');
		$('.goPrevious').attr('disabled','disabled');
	} else {
		$('.goStart').removeAttr('disabled');
		$('.goPrevious').removeAttr('disabled');
	}
	
	if (currentPage == totalPages) {
		$('.goEnd').attr('disabled','disabled');
		$('.goNext').attr('disabled','disabled');
	} else {
		$('.goNext').removeAttr('disabled');
		$('.goEnd').removeAttr('disabled');
	}
}