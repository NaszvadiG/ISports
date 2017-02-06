/**
 * Created by Admin on 2016/11/30.
 */
function infoModify(){

    var nickname = $("#input-info-nickname").val();
    var email = $("#input-info-email").val();
    var password = $("#input-info-password").val();
    var password2 = $("#input-info-password2").val();

    var submit = true;


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

    if(submit == true ){
        $.post("/info/modify",{nickname:nickname,email:email,password:password},function (data,status) {
            if(data=="true"){
                alert("修改信息成功");
                window.location.reload();
            }else{
                alert("修改信息失败");
            }
        });
    }


}