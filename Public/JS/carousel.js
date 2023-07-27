$("#myCarousel").carousel({
    interval: 7000
});
$('#myCarousels').carousel({
    interval:   3200

});
$("#back-to-top").click(function(){return $("body, html").animate({scrollTop:0},400),!1});
$(function(){$('[data-toggle="tooltip"]').tooltip()});

function hide_float_right() {

    var content = document.getElementById('float_content_right');

    var hide = document.getElementById('hide_float_right');

    if (content.style.display == "none")

    {content.style.display = "block"; hide.innerHTML = '<a href="javascript:hide_float_right()">' +
        '<i class="fa fa-comment-alt"></i> Chat với nhân viên tư vấn !' + '' + '<span><i class="fas fa-minus"></i></span>' + '</a>'; }

    else { content.style.display = "none"; hide.innerHTML = '<a href="javascript:hide_float_right()">' +
        '<i class="fa fa-comment-alt"></i> Chat với nhân viên tư vấn !</a>';

    }

};