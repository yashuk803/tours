page = {
    init:function () {
        var btnMenu = $('.btn-menu'),
            mainMenu = $('.main-menu');
        btnMenu.on('click', function () {
            if(mainMenu.css('visibility') == 'hidden'){
                mainMenu.css({"visibility": "visible"});
                mainMenu.slideDown(400);
            } else{
                mainMenu.slideUp(400, function () {
                    $(this).css({"visibility": "hidden"});
                })

            }
        });
        var iconClose = $(".icon-close"),
            bodyMassege = $(".body-message"),
            boxMassege = $(".box-message"),
            iconWrite = $(".icon-write"),
            focusEmail = $("#email-focus");

        iconClose.on('click', function () {
            if(bodyMassege.css("opacity") == 1){
                bodyMassege.fadeTo( "slow", 0, function() {
                    boxMassege.css("z-index",1);
                });
            } else {
                bodyMassege.fadeTo( "slow", 1, function() {
                    boxMassege.css("z-index","");
                });
            }
        });
        iconWrite.on("click", function () {
            if(bodyMassege.css("opacity") == 0) {
                bodyMassege.fadeTo( "slow", 1, function() {
                    boxMassege.css("z-index", "");
                });
            }
            focusEmail.focus();

        })
    }

}
$( window ).on( "load", function() {
    page.init();
});