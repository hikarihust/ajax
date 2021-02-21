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

function changeStatus(url) {
    $.get(url,
        function (data) {
            let current = $('.status-' + data.id);
            notice(current,data);
            $(current).replaceWith(data.html);
        },'json'
    );
}

function notice(current,data){
    current.notify(data.title, {
        className: data.class,
        position: 'top center',
    });
}

function trashSingle(url){
    Swal.fire(
            confirmObj('Bạn chắc chắn muốn xóa dòng dữ liệu này?', 'error', 'Xóa')
        ).then((result) => {
        if (result.isConfirmed) {
            $.get(url,
                function (data) {
                    let current = 'tr-' + data.id;
                    showToast(data.class, data.title);
                    $( '#' + current ).hide( 2000);
                },
                "json"
            );
        }
    })
}

function confirmObj(text, icon, confirmText) {
    return {
        position: 'top',
        title: 'Thông báo!',
        text: text,
        icon: icon,
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: confirmText,
        cancelButtonText: 'Hủy',
    };
}

const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
})

function showToast(type, message) {
    Toast.fire({
        icon: type,
        title: ' ' + message,
    });
}
