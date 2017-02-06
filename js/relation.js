
function search() {

    var keyword = $("#input-search-keyword").val();

    if(/^[\u4e00-\u9fa5A-Za-z0-9]{1,}$/.test()){
        $("#form-modal").submit();
    }
}
var chosen = function () {
    var id;
    var nickname;
    return {
        getId:function () {
            return id;
        },
        getNickname:function () {
            return nickname;
        },
        setId:function (i) {
            id = i;
        },
        setNickname:function (n) {
            nickname = n;
        }
    };
};
var chosenData = chosen();

$(document).ready(function () {


    $(".relation-confirm-list .list-group-item").on("click",function () {
        var value = $(this).attr("value");
        $("#button-confirm-accept").attr("value",value);
        $("#button-confirm-refuse").attr("value",value);
    });
    $("#button-confirm-accept").on("click",function () {
        var friendid = $(this).attr("value");
        var type = "accept";
        if(friendid != "-1"){
            $.post("/relation/confirm",{friendid:friendid,type:type},function (data,status) {
                if(data=="true"){
                    alert("请求成功");
                    window.location.reload();
                }else{
                    alert("请求失败");
                }
            });
        }
    });
    $("#button-confirm-refuse").on("click",function () {
        var friendid = $(this).attr("value");
        var type = "refuse";
        if(friendid != "-1"){
            $.post("/relation/confirm",{friendid:friendid,type:type},function (data,status) {
                if(data=="true"){
                    alert("请求成功");
                }else{
                    alert("请求失败");
                }
            });
        }
    });


    $(".relation-friend-list .list-group-item").on("click",function () {
        $(".relation-friend-list .chosen").removeClass("chosen");
        $(this).addClass("chosen");
        var friendid = $(this).attr("value");
        var friendnickname = $(this).children(".name").text();
        chosenData.setId(friendid);
        chosenData.setNickname(friendnickname);
        if(friendid != "-1"){
            $.post("/relation/message",{friendid:friendid,friendnickname:friendnickname},function (data,status) {
                $("#message-box").html(data);
            });
        }
    });

    $("#button-relation-send").on("click",function () {
        var friendid = chosenData.getId();
        var friendnickname = chosenData.getNickname();
        var content = $("#input-send-content").val();
        if(friendid != "-1" && content != ""){
            $.post("/relation/send",{friendid:friendid,content:content},function (data,status) {
                if(data=="true"){
                    $.post("/relation/message",{friendid:friendid,friendnickname:friendnickname},function (data,status) {
                        $("#message-box").html(data);
                        $("#input-send-content").val("");
                    });
                }else{
                    alert("发送失败");
                }
            });
        }
    });

    $("#button-relation-delete").on("click",function () {
        var friendid = chosenData.getId();
        if(friendid != "-1"){
            $.post("/relation/delete",{friendid:friendid},function (data,status) {
                if(data=="true"){
                    alert("请求成功");
                    window.location.reload();
                }else{
                    alert("请求失败");
                }
            });
        }
    });
});