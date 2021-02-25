$('.update').on('click', function(e) {
    e.preventDefault();
    let hidden = $('input[name="hidden"]').val();
    let targetid = $('input[name="targetid"]').val();
    let descrid = $('input[name="descrid"]').val();
    let updatefio = $('input[name="updatefio"]').val();
    let updatetarget = $('input[name="updatetarget"]').val();
    let updatedescription = $('textarea[name="updatedescription"]').val();
    let updatetimeInput = $('input[name="updatetimeInput"]').val();
    let updatetimeClose = $('input[name="updatetimeClose"]').val();
    let updateruc = $('input[name="updateruc"]').val();
    let updateselect = $('select[name="updateselect"]').val();
    let dateNach = $('input[name="dateNach"]').val();
    let dateClose = $('input[name="dateClose"]').val();
   console.log(descrid);
    
   $.ajax({
                url: 'update.php',
                dataType: 'text',
                type: 'POST',
            //     beforeSend: function () { // Before we send the request, remove the .hidden class from the spinner and default to inline-block.
            //     $('#loader').removeClass('hidden')
            // },
                data:
                    {
                      "hidden" : hidden,
                      "updatefio" : updatefio,
                      "targetid" : targetid,
                      "updatetarget" : updatetarget,
                      "descrid" : descrid,
                      "updatedescription" : updatedescription,
                      "updatetimeInput" : updatetimeInput,
                      "updatetimeClose" : updatetimeClose,
                      "updateselect" : updateselect,
                    //   "dateNach" : dateNach,
                    //   "dateClose" : dateClose,
                    },
                success: function (update){ 
                    // alert(update);             
                    $(".modal").modal("hide");
                    preloader();
                    window.location.reload();
                    

                },
                // error: function (error) {
                //     alert("Произошла ошибка, проблема решается сист.администратором!");
                // },
     });
});