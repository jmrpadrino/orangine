var loaderContent;
$(document).ready( function(){
    doLoader();
    setTimeout( function(){
        destroyLoader();
        $('.orangine-wrapper').animate({opacity: 1}, 400);
    }, 1000);
    $('[data-toggle=dropdown]').on('click', function(event) { 
        if($(this).next('ul').length > 0){
            event.preventDefault(); 
            event.stopPropagation(); 
            $(this).parent().siblings().removeClass('open'); 
            $(this).parent().toggleClass('open');
        }else{
            window.location = this.href;    
        }
    });
})
$(window).scroll( function(){
    if($(window).scrollTop() > $('.orangine-navbar').height()-50 ){
        //if($(window).scrollTop() > 15 ){
        $('.orangine-navbar').addClass('set-small');
    }else{
        $('.orangine-navbar').removeClass('set-small');
    }
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