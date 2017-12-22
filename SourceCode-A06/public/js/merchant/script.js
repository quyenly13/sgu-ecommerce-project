$(function() {
    // Input radio-group visual controls
    $('.radio-group label').on('click', function(){
        $(this).removeClass('not-active').siblings().addClass('not-active');
    });

    $('#alertbox').removeClass('hide');
    $('#alertbox').delay(3000).slideUp(500);
});