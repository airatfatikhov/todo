$( document ).ready(function() {
    preloader();

});

function preloader(){
    $.ajax({
        beforeSend: function() {
            setTimeout(function(){
                    $('#loader').addClass('loader');
                }, 2000);
        },
        complete: function() {
            $('#loader').removeClass("loader");
        },
});
}