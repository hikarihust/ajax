$(document ).ready(function() {
    $(".qr-code").hide();

    $(".alert-default").hide();

    $(".btn-show").click(function() {
        $(".two-factor-auth-form").hide();
        $(".qr-code").show();
    });

    $(".btn-cancel").click(function() {
        $(".two-factor-auth-form").show();
        $(".qr-code").hide();
    });

    $(".btn-submit").click(function() {
        $("#alert-error").hide();
        $("#alert-success").hide();

        var code = $("#code").val();
        var secret = $("#secret").val();
        var email = $("#email").val();

        if(code == "") {
            $("#alert-error").show().text("Please input code");
            return;
        }

        $.ajax({
            url: "process.php",
            method: "POST",
            data: {
                code,
                secret,
                email
            },
            dataType: "json"
        }).done(function(data) {
            if(data.status == "error") {
                $("#alert-error").show().text(data.msg);
            }
            else if(data.status == "success") {
                $("#alert-success").show().text(data.msg);
            }
        }).fail(function(error) {
            console.log(error);
        });
    });
});