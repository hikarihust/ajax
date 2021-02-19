let ITEM_PER_PAGE = 4;
let page = 0;
let flag = false;
let filmHtmlTemplate = $('#templateHtml');
let showFilmsElement = $('#show-films');


$(document).ready(function () {
    loadData();
});

function loadData() {
    $.ajax({
        type: "GET",
        url: "load_more.php",
        data: {
            limit : ITEM_PER_PAGE + 1,
            offset : page * ITEM_PER_PAGE
        },
        dataType: "json",
        success: function (data) {
            if (data.items.length > ITEM_PER_PAGE) {
                page++;
                let showItems = data.items.slice(0, ITEM_PER_PAGE);
                appendData(showItems,filmHtmlTemplate, showFilmsElement);
            } else {
                $('#btn-show').hide();
                appendData(data.items, filmHtmlTemplate, showFilmsElement);
            }
        }
    });
}

function appendData(items, filmHtmlTemplate, showFilmsElement) {
    if (items.length > 0) {
        $.each(items, (index, value) => {
            let htmlMore = filmHtmlTemplate.html();
            htmlMore = htmlMore.replace(/{image}/g, value.image);
            htmlMore = htmlMore.replace(/{title}/g, value.title);
            htmlMore = htmlMore.replace(/{description}/g, value.description);
            showFilmsElement.append(htmlMore);
        });
    }
    $("body, html").animate({scrollTop: $(document).height()}, 500);
}