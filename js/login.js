function adjustContainer() {
    var container = $(".login-container");
    container.css('height',$(window).height());
}
$(document).ready(adjustContainer());
$(window).resize(adjustContainer());

function signup(){

    var username = $("#input-signup-username").val();
    var password = $("#input-signup-password").val();
    var password2 = $("#input-signup-password2").val();
    var nickname = $("#input-signup-nickname").val();
    var email = $("#input-signup-email").val();

    var submit = true;
    var checkInUse = false;


    if(/^[A-Za-z]\w{5,15}$/.test(username)){
        $("#form-group-username").removeClass("has-error").addClass("has-success");

        $.post("login/exist_user",{username:username},function (data,status) {
            if(data=="true"){
                $("#form-group-username").removeClass("has-success").addClass("has-error");
                submit = false;
                checkInUse = true;
            }else{
                if(/^\w{6,16}$/.test(password)){
                    $("#form-group-password").removeClass("has-error").addClass("has-success");

                    if(/^\w{6,16}$/.test(password2) && password===password2){
                        $("#form-group-password2").removeClass("has-error").addClass("has-success");
                    }else{
                        $("#form-group-password2").removeClass("has-success").addClass("has-error");
                        submit = false;
                    }

                }else{
                    $("#form-group-password").removeClass("has-success").addClass("has-error");
                    submit = false;
                }




                if(/^[\u4e00-\u9fa5A-Za-z0-9]{4,16}$/.test(nickname)){
                    $("#form-group-nickname").removeClass("has-error").addClass("has-success");
                }else{
                    $("#form-group-nickname").removeClass("has-success").addClass("has-error");
                    submit = false;
                }

                if(/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/.test(email)){
                    $("#form-group-email").removeClass("has-error").addClass("has-success");
                }else{
                    $("#form-group-email").removeClass("has-success").addClass("has-error");
                    submit = false;
                }
                if(submit == true ){
                    $("#form-signup").submit();
                }
            }
        })

    }else{
        $("#form-group-username").removeClass("has-success").addClass("has-error");
        submit = false;
    }


}