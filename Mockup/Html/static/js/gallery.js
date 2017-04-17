var grid = $('#grid');
var itemImage = $('.item-image');


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


itemImage.on('mouseenter mouseleave', function () {
    var icons = $(this).children('.icons-image');
    icons.fadeToggle('fast','linear');
});


itemImage.on('click', function (e) {
    var elem = $(this);
    if (elem.hasClass('active'))
    {
        grid.find(".item-image").not('.active').toggleClass('blur');
        elem.remove('active');
        elem.next('.item-image-sidepart').removeClass('active');
    }
    else {
        elem.addClass('active');
        elem.next('.item-image-sidepart').addClass('active');
        grid.find(".item-image").not('.active').toggleClass('blur');
    }


    elem.parent().toggleClass('mid-width');
    elem.next('.item-image-sidepart').fadeToggle();

    grid.masonry('layout');
    e.preventDefault();

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
