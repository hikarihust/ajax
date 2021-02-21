$(document).ready(function() {
    $('#subscribe-form').click(function(e) {
        let value = $('.subscribe-form').val();
        if(isEmail(value)) {
            let dt = new Date();
            let time = dt.getDate() + "/" + (dt.getMonth() + 1) + "/" + dt.getFullYear();

            $.ajax({
                type: "GET",
                url: "save_user.php",
                data: {
                    email: value,
                    time: time
                },
                dataType: "json",
                success: function(data) {
                    displayMsg(false, true);
                }
            });
        } else {
            displayMsg(true, false);
        }
    })
});

function isEmail($email) {
    if($email == '') {
        return false;
    }
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test($email);
}

function displayMsg ($error = false, $success = false) {
    $error == true ? $('.error-subscript').css('display', 'block') : $('.error-subscript').css('display', 'none');
    $success == true ? $('.success-subscript').css('display', 'block') : $('.success-subscript').css('display', 'none');
}