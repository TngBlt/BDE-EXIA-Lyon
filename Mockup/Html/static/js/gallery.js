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

iconsImage.on('mouseenter', function () {
    $(this).parent().find('.image-link img').css('opacity','0.7')
});

iconsImage.on('mouseleave', function () {
    $(this).parent().find('.image-link img').css('opacity','1')
});
