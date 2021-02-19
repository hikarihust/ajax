let filmHtmlTemplate = $('#templateHtml');
let showFilmsElement = $('.content-movie');
let categoryId = 1;


$(document).ready(function(){
	init().then(function (categoryId) { 
		loadData(categoryId);
        handleClassActive(categoryId);
	});

	$('.tab-movie-demo').click(function (e) { 
		let id = $(this).attr('id');
		loadData(id);
        handleClassActive(id);
	});
});

function init() {
	return new Promise(function(resolve, reject) {
		$.ajax({
			type: "GET",
			url: "tab.php",
			data: {
				type : 'category'
			},
			dataType: "json",
			async: false,
			success: function (data) {
				let activeDefault = 0;
				$.each(data, (key, value) =>{
					if(activeDefault == 0){
						$('#tab-category-demo').append('<li id="' + value.id + '" class="active tab-movie-demo"><a href="javascript:void(0)">'+ value.name +'</a></li>');
					}else{
						$('#tab-category-demo').append('<li id="' + value.id + '" class="tab-movie-demo"><a href="javascript:void(0)">'+ value.name +'</a></li>');
					}
					activeDefault++;
				})
			}
		});
		resolve(categoryId);
		reject('Error');
	});
}

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

function handleClassActive(id) {
	$('#tab-category-demo li').removeClass("active");
	$("#" + id).addClass("active");
}
