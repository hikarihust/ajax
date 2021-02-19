let ITEM_PER_PAGE = 4;
let page = 0;
let flag = false;


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
            
        }
    });
}