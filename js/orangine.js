/* Smooth Scroll*/

$(function () {
    "use strict";
    $('a[href*=#]:not([href=#])').click(function () {
        
        if (location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') && location.hostname === this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                $('html,body').animate({
                    scrollTop: target.offset().top - 80
                }, 1000);
                return false;
            }
        }
    });
});

/*----- END SMOOTH SCROLL ------*/

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
$(document).ready( function(){
    console.log('upgraded');
    $('#yith-ywraq-mail-form').submit( function(e){
        var cartList = [];
        var user = {
            'name' : $('[name="rqa_name"]').val(),
            'email' : $('[name="rqa_email"]').val(),
            'message' : $('[name="rqa_message"]').val(),
            'ruc' : $('[name="rqa_cedula"]').val(),
            'dir' : $('[name="rqa_dir"]').val(),
            'tel' : $('[name="rqa_phone"]').val(),
        };

        $('.cart_item').each( function(index, value){
            var subtotal = $(this).children('.product-subtotal').children('.woocommerce-Price-amount');
            subtotal.find('.woocommerce-Price-currencySymbol').remove();
            var item = {};

            item['name'] = $(this).children('.product-name').text().trim();
            item['quantity'] = $(this).children('.product-quantity').children('.quantity').children('.qty').val();
            item['producto_id'] = $(this).children('.product-quantity').children('.rqa_prod_id').val();
            item['sku'] = $(this).children('.product-quantity').children('.rqa_sku').val();
            item['desc'] = $(this).children('.product-quantity').children('.rqa_desc').val();
            item['subtotal'] = subtotal.text();


            cartList.push(item);
        })
        $.ajax({
            type        : 'POST', 
            url         : orangine.orangineAjax, 
            data        : 
            {
                'action': 'ajaxConversion',
                'action': 'orangine_enviar_mail_pedido',
                'user' : user,
                'cartList' : cartList
            },
            dataType: 'text',
            beforeSend  : function(){
                //console.log(user); 
            },
            error       : function(data){
                //console.log('error');
            },
            success     : function(data){
                
                if (data == 'true'){
                    $( "#dialog-confirm" ).dialog({
                        resizable: false,
                        height: "auto",
                        width: 400,
                        closeOnEscape: false,
                        modal: true,
                        buttons: {
                            "Aceptar": function() {
                                $( this ).dialog( "close" );
                                document.location.href="/";
                            },
                        }
                    });
                }

            }
        });
        e.preventDefault();
    })
})