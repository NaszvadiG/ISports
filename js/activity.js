

$(document).ready(function () {
    $("#activity-content").html($("#activity-all").html());
    $(".datetime-picker").datetimepicker({
        language:"zh-CN",
        autoclose: true,
        todayBtn: true,
        startDate: new Date().toDateString(),
        minuteStep: 5
    });

    $("#button-activity-all").on("click",function () {
        if($(this).hasClass("active")){

        }else{
            $(this).addClass("active");
            $("#button-activity-mine").removeClass("active");
            $("#activity-content").html($("#activity-all").html());
        }
    });

    $("#button-activity-mine").on("click",function () {
        if($(this).hasClass("active")){

        }else{
            $(this).addClass("active");
            $("#button-activity-all").removeClass("active");
            $("#activity-content").html($("#activity-mine").html());
        }
    });

});

function joinActivity(button) {
    var activityid = $(button).attr("value");
    $.post("/activity/join",{activityid:activityid},function (data,status) {
        if(data=="true"){
            alert("参与成功");
            window.location.reload();
        }else{
            alert("参与失败");
        }
    });
}

function showActivity(button) {
    $("#show-activity-name").val($(button).attr("name"));
    $("#show-activity-spot").val($(button).attr("spot"));
    $("#show-activity-starttime").val($(button).attr("starttime"));
    $("#show-activity-endtime").val($(button).attr("endtime"));
    $("#show-activity-content").val($(button).attr("content"));
}


function createActivity() {
    var name = $("#input-activity-name").val();
    var spot = $("#input-activity-spot").val();
    var starttime = $("#input-activity-starttime").val();
    var endtime = $("#input-activity-endtime").val();
    var content = $("#input-activity-content").val();

    var submit = true;

    if(/^.{4,24}$/.test(name)){
        $("#form-group-name").removeClass("has-error").addClass("has-success");
    }else{
        $("#form-group-name").removeClass("has-success").addClass("has-error");
        submit = false;
    }

    if(/^.{4,40}$/.test(spot)){
        $("#form-group-spot").removeClass("has-error").addClass("has-success");
    }else{
        $("#form-group-spot").removeClass("has-success").addClass("has-error");
        submit = false;
    }

    if(starttime<=endtime && starttime!="" && endtime!=""){
        $("#form-group-time").removeClass("has-error").addClass("has-success");
    }else{
        $("#form-group-time").removeClass("has-success").addClass("has-error");
        submit = false;
    }

    if(/^.{5,300}$/.test(content)){
        $("#form-group-content").removeClass("has-error").addClass("has-success");
    }else{
        $("#form-group-content").removeClass("has-success").addClass("has-error");
        submit = false;
    }

    if(submit == true ){
        $.post("activity/create",
            {
                name:name,
                spot:spot,
                starttime:starttime,
                endtime:endtime,
                content:content
            },
            function (data,status) {
                if(data=="true"){
                    alert("创建成功");
                    window.location.reload();
                }else if(data=="false"){
                    alert("创建失败");
                }else{
                    alert(data);
                }
            }
        )
    }
}