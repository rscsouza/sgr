$( "form" ).submit(function( event ) {
    $(".card").css('display','none');
    $(".area_container").css('display','none');
    $("#processando_solicitacao").css('display','block');
});

$( "a" ).click(function( event ) {
    linkConstrucao="javascript:alert('Em desenvolvimento')";
    if(linkConstrucao==$(this).attr("href")){

    }else{
        let link = $(this).attr("href");
        if (link.indexOf('#') > -1)
        {

        }
        else{
            $("#area_home").css('display','none');
            $(".area_container").css('display','none');
            $("#processando_solicitacao").css('display','block');
        }
    }


});
