$(function(){
    $(window).scroll(function(){
        if($(this).scrollTop()!=0){
            $('#myBtn').fadeIn();
        }
        else{
            $('#myBtn').fadeOut();
        }
    });
    $('#myBtn').click(function(){
        $('body,html').animate({
            scrollTop:0
        },800);
    });
});