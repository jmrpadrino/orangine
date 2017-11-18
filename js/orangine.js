var loaderContent;
$(document).ready( function(){
    doLoader();
    setTimeout( function(){
        destroyLoader();
        $('.orangine-wrapper').animate({opacity: 1}, 400);
    }, 4000);
})
function doLoader(){
    loaderContent = '<div class="orangine-loader">';
    loaderContent += '<img class="loader-gif" src="'+orangine.orangineTheme+'/images/loader-animation.gif">';
    loaderContent += '</div>';
    $('body').prepend(loaderContent);
}
function destroyLoader(){
    $('body').css('overflow-y','auto');
    $('.orangine-loader').remove();
}