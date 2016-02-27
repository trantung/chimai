$(document).foundation('reflow');
$(window).load(function() {
    gototop();
    scrollnav();
});
function gototop()
{
    var t = $(".go-to-top");
    $(window).scroll(function() {
        if ($(this).scrollTop() > 10) {
            t.addClass("active");
        } else {
            t.removeClass("active");
        }
    });
    t.click(function() {
        $('body,html').animate({scrollTop: 4}, 300);
        return false;
    });
}

function scrollnav()
{
    var t = $(".navbar");
    var lastScrollTop = 0;
    $(window).scroll(function(event){
        var st = $(this).scrollTop();
        if (st > lastScrollTop || st < 123){
            // downscroll code
            t.removeClass("contain-to-grid fixed");
        } else {
           // upscroll code
           t.addClass("contain-to-grid fixed");
        }
        lastScrollTop = st;
    });
}

(function($){

})(jQuery);