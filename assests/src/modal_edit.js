// $( document ).ready(function() {
//   $('.edit').on('click', function (event) {
//     var button = $(event.relatedTarget) // Button that triggered the modal
//     var recipient = button.data('whatever') // Extract info from data-* attributes
//     // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
//     // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
//     var modal = $(this)
//     var id = $(this).data('id');      
//       var name = $(this).data('name');  
//       var duration = $(this).data('duration');     
//       var date = $(this).data('date');  
//       var content = $(this).data('content');  
//       var ruc = $(this).data('ruc');  
//       console.log(id);  
  
//       $('#fio').val(id);  
//       $('#target').val(name);  
//       $('#description').val(duration);  
//       $('#timeInput').val(date);  
//       $('#timeClose').val(content);  
//       $('#ruc').val(ruc);  
//     // modal.find('.modal-title').text('New message to ' + recipient)
//     // modal.find('.modal-body input').val(recipient)
//   })
// });