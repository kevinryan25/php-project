$(function(){
    $('.searchbar .control').focus(function(){
        $(this).parent().addClass('focus');
    })
    $('.searchbar .control').blur(function(){
        $(this).parent().removeClass('focus');
    })


    $('.resultsperpage').change(null, function(){
        var loc = window.location.href;
        window.location = loc.substr(0, loc.indexOf('?'))+"?shown="+this.value;
    })

    $('.searchbar .control').keyup(function(){
        var q = this.value;
        search(q, 'name', 'teacher');
    })

})


