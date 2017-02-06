/**
 * Created by Admin on 2016/10/17.
 */
//$("#top-sidebar").load("common/top-sidebar.html");
//$("#left-sidebar").load("common/left-sidebar.html");

function adjustContainer() {
    var container = $("#container");
    container.css('height',$(window).height());
    //container.css('width',$(window).width());
}
$(document).ready(adjustContainer());

$(window).resize(adjustContainer());