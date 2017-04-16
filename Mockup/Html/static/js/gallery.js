var grid = $('#grid');
$(grid).imagesLoaded( function() {
    $(grid).masonry({
        columnWidth:'div.item',
        itemSelector: 'div.item'
    });
});
var iconsImage = $('.icons-image');
$('.item-image').on('mouseenter mouseleave', function () {
    var $icons = $(this).children('.icons-image');
    $icons.fadeToggle('fast','linear');
});

