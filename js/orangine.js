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
    loaderContent += '<div class="loader-container">';
    loaderContent += '<img src="'+orangine.orangineTheme+'/images/loader-animation.gif">';
    loaderContent += '<span class="orangine-loader-text">Orangine Love!</span>';
    loaderContent += '</div>';
    loaderContent += '</div>';
    $('body').prepend(loaderContent);
}
function destroyLoader(){
    $('body').css('overflow-y','auto');
    $('.orangine-loader').remove();
}