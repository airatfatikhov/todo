// $('.exports').on('click', function(e) {
//     e.preventDefault();
//     let exports = $('button[type="submit"]').val();
//       console.log(exports);
      
//     $.ajax({
//         url: 'excel.php',
//         type: 'POST',
//     //     beforeSend: function () { // Before we send the request, remove the .hidden class from the spinner and default to inline-block.
//     //     $('#loader').removeClass('hidden')
//     // },
//         data:
//             {
//               "exports" : exports,
//             },
//         success: function (exports){              
//             console.log(exports)
//         },
//         // error: function (error) {
//         //     alert("Произошла ошибка, проблема решается сист.администратором!");
//         // },
// });
// });