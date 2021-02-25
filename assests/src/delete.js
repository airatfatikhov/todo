function del() {
    $('.remove').on('click', function(e) {
        e.preventDefault();
        let id = $('button[data-target=#delete]').attr('data-id');
        let target_id = $('button[data-content=#target]').attr('data-name');

        let hiddenid = $('input[name="hiddenid"]').val();
        console.log(hiddenid);
       
        $.ajax({
                    url: 'delete.php',
                    cache: false,
                    dataType: 'text',
                    type: 'POST',
                    data:
                        {
                          "hiddenid" : hiddenid,
                        //   "target_id" : target_id,
                        },
                    success: function (data){
                        mail_delete();
                        window.location.reload();
                        window.location.hide();
                    },
         });
    });
}

function mail_delete() {
    $.ajax({
            url : "mail_delete.php",
            type : "POST",
             success:function(send) {
                
            },
    });
}