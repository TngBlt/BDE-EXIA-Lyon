var grid = $('#grid');
var itemImage = $('.item-image');
var elem;

$(grid).imagesLoaded( function() {
    $(grid).masonry({
        columnWidth:'div.item',
        itemSelector: 'div.item'
    });
    itemImage.each(function (){
        var isOnView = Utils.isElementInView(this,false);

        if(isOnView)
        {
            $(this).removeClass('hidden-item');
        }
        else{
            $(this).addClass('hidden-item');
        }
    });
});

$(window).scroll( function () {
    console.log('scroll');
    itemImage.each(function (){
        var isOnView = Utils.isElementInView(this,false);
        var elem = $(this);
        if(isOnView) {
            elem.css({'opacity':'1'});
        }
        else {
            elem.css({'opacity':'0'});
        }
    });
});

$('.item').on("mouseenter mouseleave", function () {
   console.log('tanguy');
});

itemImage.on("mouseenter mouseleave",function () {
    var icons = $(this).children('.icons-image');
    console.log('TANGUY');
    if(!$(this).parent().hasClass('active'))
    {
        console.log('TANGUY');
        icons.fadeToggle('fast','linear');
    }
    else {
        icons.fadeOut();
    }

});



itemImage.on('click', function (e) {
    if(!grid.find('.item').hasClass('active') || elem.is($(this))){
        elem = $(this);
        elem.parent().toggleClass('mid-width');
        elem.parent().toggleClass('active');
        grid.find('.item').not('.active').not(elem.parent()).toggleClass('blur');
        //$(elem.parent()).bind("transitionend webkitTransitionEnd oTransitionEnd MSTransitionEnd", function(){
            grid.masonry('layout');
        //});
        elem.find('.icons-image').fadeToggle();
        e.preventDefault();
    }
    else {
        // previous element
        elem.parent().toggleClass('mid-width');
        elem.parent().toggleClass('active');
        grid.find('.item').not('.active').not(elem.parent()).toggleClass('blur');

        // new element
        elem = $(this);
        elem.parent().toggleClass('mid-width');
        elem.parent().toggleClass('active');
        grid.find('.item').not('.active').not(elem.parent()).toggleClass('blur');

        grid.masonry('layout');

        elem.find('.icons-image').fadeToggle();

    }

});





function Utils() {

}

Utils.prototype = {
    constructor: Utils,
    isElementInView: function (element, fullyInView) {
        var pageTop = $(window).scrollTop();
        var pageBottom = pageTop + $(window).height();
        var elementTop = $(element).offset().top;
        var elementBottom = elementTop + $(element).height();

        if (fullyInView === true) {
            return ((pageTop < elementTop) && (pageBottom > elementBottom));
        } else {
            return ((elementTop <= pageBottom) && (elementBottom >= pageTop));
        }
    }
};

var Utils = new Utils();


function isScrolledIntoView(elem)
{
    var docViewTop = $(window).scrollTop();
    var docViewBottom = docViewTop + $(window).height();

    var elemTop = $(elem).offset().top;
    var elemBottom = elemTop + $(elem).height();

    return ((elemBottom <= docViewBottom) && (elemTop >= docViewTop));
}
