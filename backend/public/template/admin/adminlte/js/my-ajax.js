$(document).ready(function () {
    $('.filmName').on('change keyup paste', function (e) { 
        let filmName = $(this).val();
        let id = $(this).attr('id');
        let current = $(this);
        let url = `index.php?module=backend&controller=index&action=changeAjax`;
        $.get(url, {'value' : filmName,'id' : id,'type' : 'changeNameFilm'},
            function (data) {
                notice(current, data);
            },'json'
        );
    });

    $('select[name=category_name]').change(function (e) { 
        let id = $(this).attr('id');
        let current = $(this);
        
        let value = $(this).val();
        let url = `index.php?module=backend&controller=index&action=changeAjax`;
        $.get(url, {'value' : value,'id' : id,'type' : 'changeCategoryName'},
            function (data) {
                notice(current,data);
            },'json'
        );
    });
});

function notice(currrent,data){
    currrent.notify(data.title, {
        className: data.class,
        position: 'top center',
    });
}
