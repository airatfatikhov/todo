// $('.update').on('click', function(e) {
//     e.preventDefault();
//     let dateNach = $('input[name="dateNach"]').val();
//     let dateClose = $('input[name="dateClose"]').val();

//    console.log(dateNach);
//    console.log(dateClose);
    
//    $.ajax({
//                 url: 'insert_date.php',
//                 dataType: 'text',
//                 type: 'POST',
//             //     beforeSend: function () { // Before we send the request, remove the .hidden class from the spinner and default to inline-block.
//             //     $('#loader').removeClass('hidden')
//             // },
//                 data:
//                     {
//                       "dateNach" : dateNach,
//                       "dateClose" : dateClose,
//                     },
//                 success: function (insert_date){ 
//                     // alert(update);             
//                     $(".modal").modal("hide");
//                     preloader();
//                     window.location.reload();
                    

//                 },
//                 // error: function (error) {
//                 //     alert("Произошла ошибка, проблема решается сист.администратором!");
//                 // },
//      });
// });