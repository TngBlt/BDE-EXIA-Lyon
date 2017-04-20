var grid = $('#grid');
var itemImage = $('.item-image');
var elem;
var pictureID = new Array();

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
    if(!$(this).parent().hasClass('active'))
    {
        icons.fadeToggle('fast','linear');
    }
    else {
        icons.fadeOut();
    }

});

$(".item-select-checkbox").on("click",addToUrl);

function addToUrl(e) {
    e.stopPropagation();
    var elem = $(this);
    var checked = elem.parent().next(".checked-div").find(".icons-image-checked");
    var downloadbtn = $('.gallery-download');
    var checkbox = elem.children('input');
    var picid = checkbox.data('id');

    if(elem.hasClass('checked'))
    {
        var index = pictureID.indexOf(picid);
        pictureID.splice(index, 1);
        checkbox.checked = false;
        elem.removeClass('checked');
        if(pictureID.length < 1)
        {
            downloadbtn.fadeOut();
            checked.addClass('hidden');
        }
    }
    else {
        pictureID.push(picid);
        checkbox.checked = true;
        elem.addClass('checked');
        checked.removeClass('hidden');

        if(pictureID.length >= 1)
        {
            downloadbtn.fadeIn();
        }
    }
}

$(".gallery-download a").on("click", setUrl);

function setUrl() {
    var elem = $(this);
    var href = elem.data('baseurl')+"?p=";
    var idJoined = pictureID.join(';');
    var fullhref = href+idJoined;

    elem.attr('href', fullhref);
}

$(".icons-image label").on('click', function (e) {

    e.stopPropagation();


});

$(".item-image:not(.item-image-sidepart)").on('click', function (e) {
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
