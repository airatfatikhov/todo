$( document ).ready(function() {
    preloader();
    $('.edit').on('click', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whatever') // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        // var update = $(this).data('target');  
          var id = $(this).data('id'); 
          var targetid = $(this).data('targetid');  
          var descrid = $(this).data('descrid'); 
          var update = $(this).data('update');     
          var name = $(this).data('name');  
          var duration = $(this).data('duration');     
          var date = $(this).data('date');  
          var content = $(this).data('content');  
          var ruc = $(this).data('ruc');   
          console.log(descrid); 
          $('#fio').val(id);  
          $('#targetid').val(targetid);
          $('#descrid').val(descrid);
          $('#hidden').val(update);
          $('#target').val(name);  
          $('#description').val(duration);  
          $('#timeInput').val(date);  
          $('#timeClose').val(content);  
          $('#ruc').val(ruc);  
        // modal.find('.modal-title').text('New message to ' + recipient)
        // modal.find('.modal-body input').val(recipient)
      });
      del();
  });

$('#form').on('click', function(e) {
    e.preventDefault();
    let fio = $('input[name="fio"]').val();
    let mail = $('input[name="mail"]').val();
    let target = $('input[name="target"]').val();
    let description = $('textarea[name="description"]').val();
    let timeInput = $('input[name="timeInput"]').val();
    let timeClose = $('input[name="timeClose"]').val();
    let ruc = $('input[name="ruc"]').val();
    let select = $('select[name="select"]').val();
    let dateNach = $('input[name="dateNach"]').val();
    let dateClose = $('input[name="dateClose"]').val();
    if(target.length == '') {
        $('.target').fadeIn('.emptyTarget');
    }

    else {
        $('.target').remove('.emptyTarget');
    }

    if(description.length == '') {
        $('.description').fadeIn('.emptyDescription');
    }

    else {
        $('.description').remove('.emptyDescription');
    }

    if(timeInput.length == '') {
        $('.timeInput').fadeIn('.emptyTimeInput');
    }

    else {
        $('.timeInput').remove('.emptyTimeInput');
    }

    if(timeClose.length == '') {
        $('.timeClose').fadeIn('.emptyTimeClose');
    }

    else {
        $('.timeClose').remove('.emptyTimeClose');
    }

    
   $.ajax({
                url: 'insert.php',
                dataType: 'json',
                type: 'POST',
            //     beforeSend: function () { // Before we send the request, remove the .hidden class from the spinner and default to inline-block.
            //     $('#loader').removeClass('hidden')
            // },
                data:
                    {
                      "fio" : fio,
                      "mail" : mail,
                      "target" : target,
                      "description" : description,
                      "timeInput" : timeInput,
                      "timeClose" : timeClose,
                      "ruc" : ruc,
                      "select" : select,
                      "dateNach" : dateNach,
                      "dateClose" : dateClose,
                    },
                success: function (data){              
                    if(data.status === true) {
                        $(".modal").modal("hide");
                        loader();
                        $('#table').addClass('table');
                        $('#table').removeClass('table');
                        // $('input[name="fio"]').val("");
                        // $('input[name="mail"]').val("");
                        $('input[name="target"]').val("");
                        $('textarea[name="description"]').val("");
                        $('input[name="timeInput"]').val("");
                        $('input[name="timeClose"]').val("");
                        // $('input[name="ruc"]').val("");
                            View_Date();
                            mails();
                            // window.location.reload();

                    }
                    if(data.status === false) {
                        $('.msg').text(data.message);
                       }
                },
                // error: function (error) {
                //     alert("Произошла ошибка, проблема решается сист.администратором!");
                // },
     });
});


// Показать информацию с БД
function View_Date() {
    $.ajax({
            url : "view.php",
            type : "POST",
             success:function(view) {
                // data = $.parseJSON(data);
                // if(data.status =='success') {
                    $('#table').html(view);
                    // $('#table').addClass('table');
                // }
            }
    });
}

function loader() {
    $.ajax({
            url : "view.php",
            type : "POST",
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

function mails() {
    $.ajax({
            url : "mail.php",
            type : "POST",
             success:function(send) {
                
            },
    });
}




