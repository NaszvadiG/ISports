/**
 * Created by Admin on 2016/11/29.
 */
$("#button-blog-message").on("click",function () {
    var content = $("#blog-message-content").val();
    if(content != ""){
        $.post("blog/publish",{content:content},function (data,status) {
            if(data=="true"){
                alert("发布成功");
                window.location.reload();
            }else{
                alert("发布失败");
            }
        });
    }
});

$(".button-blog-comment").on("click",function () {
    var content = $(this).parent().parent().children("input").val();
    var messageid = $(this).attr("value");
    if(content != ""){
        $.post("blog/comment",{messageid:messageid,content:content},function (data,status) {
            if(data=="true"){
                alert("评论成功");
                window.location.reload();
            }else{
                alert("评论失败");
            }
        });
    }
});

function blogFollow(followid) {
    $.post("/blog/follow",{followid:followid},function (data,status) {
        if(data=="true"){
            alert("关注成功");
            window.location.reload();
        }else{
            alert("关注失败");
        }
    });
}

function blogUnfollow(followid) {
    $.post("/blog/unfollow",{followid:followid},function (data,status) {
        if(data=="true"){
            alert("取消关注成功");
            window.location.reload();
        }else{
            alert("取消关注失败");
        }
    });
}