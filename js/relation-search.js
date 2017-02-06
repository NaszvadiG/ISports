/**
 * Created by Admin on 2016/11/28.
 */
$(document).ready(function () {
    $(".list-group-item").on("click",function () {
        var value = $(this).attr("value");
        $("#button-add-friend").attr("value",value);
    });
    $("#button-add-friend").on("click",function () {
        var friendid = $(this).attr("value");
        if(friendid != "-1"){
            $.post("/relation/add",{friendid:friendid},function (data,status) {
                if(data=="true"){
                    alert("申请成功");
                    window.location.reload();
                }else{
                    alert("申请失败");
                }
            });
        }
    });
});