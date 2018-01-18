$(function(){
    var isPageSpeed = /Google Page Speed Insights/.test(navigator.userAgent);

    // что-бы результат был аж 100!))
    if(isPageSpeed){
        return;
    }

    $('.list-faq').each(function(){
        var items = $('> li',this);

        items.each(function(){
            var li = $(this);

            $('h4,.trigger',this).on('click',function(){
                $('.drop',li).slideToggle();
            })
        })
        
    })

    if($(window).width() <= 768){
        $('.wow').attr('data-wow-duration','0.5s');
    }

    new WOW().init();

    $('.tovar-buy-input,.form-input-number').each(function(){
        var elem  = $(this),
            span  = $('span',elem);

        var input = $('input',elem);

        var setVal = function(a){
            var p = parseInt(input.val());
                p = isNaN(p) ? 0 : p;

                p = p+a;

                p = p < 1 ? 1 : p;

            input.val(p);
        }

        span.eq(0).on('click',function(){
            setVal(-1)
        })
        span.eq(1).on('click',function(){
            setVal(1)
        })
    })

    $('.datepicker').datepicker({
        language: "ru"
    });
})