/***************************************************************************
*
* SCRIPT JS
*
***************************************************************************/

$(document).ready(function(){
    
    //Scale in SP
    // if(screen.width < 768) {
    //     $('meta[name=viewport]').attr('content','width=device-width, initial-scale=1');
    // }

    // $(window).resize(function () {
    //     if(screen.width < 768) {
    //         $('meta[name=viewport]').attr('content','width=device-width, initial-scale=1');
    //     }
    // });


    // Hover Button for All Pages
    $('.hoverJS').hover(function(){
        $(this).stop().fadeTo(100,0.8);
    },function(){
        $(this).stop().fadeTo(100,1);
    });
    

    //Click event to scroll to top
    $('.backtotop').click(function(){
        $('html, body').animate({scrollTop : 0},800);
        return false;
    });

    scrollbacktop(130);
    $(window).scroll(function(){
        scrollbacktop(130);
    });

    // Click Event StationItem top page
    $('.stationItem .staTitle').click(function() {
        $(this).toggleClass('open');
        $(this).next().stop().slideToggle(500);
    });

    // Event listSights change display
    $('.boxListpost .displayBtn li a').click(function(){
        $('.boxListpost .displayBtn li a').removeClass('active');
        $(this).addClass('active');
        $('.boxListpost .boxContent .listSights').removeClass('girdView listView');
        var classadd = $(this).attr('data-view');
        $('.boxListpost .boxContent .listSights').addClass(classadd);
        return false;
    });


    //JS scroll to anchor
    $('a[href*=#]:not([href=#])').click(function() {
        if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
            if (target.length) {
                $('html,body').animate({
                    scrollTop: target.offset().top - 109
                }, 1000);
                return false;
            }
        }
    });

});


function scrollbacktop(vlscroll) {
    if ( $(this).scrollTop() > vlscroll ) {
        $('.backtotop').fadeIn(400);
    } else {
        $('.backtotop').fadeOut(400);
    }
}