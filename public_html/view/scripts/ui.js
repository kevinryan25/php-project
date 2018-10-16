$(function(){
    $('.searchbar .control').focus(function(){
        $(this).parent().addClass('focus');
    })
    $('.searchbar .control').blur(function(){
        $(this).parent().removeClass('focus');
    })
})
