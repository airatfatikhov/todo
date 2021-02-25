    $('.btn').on('click', function(e) {
    e.preventDefault();
    let userName = $('input[name="userName"]').val();
    let password = $('input[name="password"]').val();
    if(userName.length=='') {
        $('.login').fadeIn('.emptyUser');
    }
    else {
        $('.login').remove('.emptyUser');
    }

    if(password.length=='') {
        $('.password').fadeIn('.emptyPassword');
    }
    else {
        $('.password').remove('.emptyPassword');
    }
    $.ajax({
                url: 'index.php',
                dataType: 'json',
                cache: false,
                type: 'POST',
                data:
                    {
                      "userName" : userName,
                      "password" : password,
                    },
                success: function (data){
                   if(data.status === true) {
                    window.location.href = 'mane.php';
                   }
                   if(data.status_admin ===true) {
                       window.location.href = 'admin/admin.php';
                   }
                   else {
                    $('.msg').text(data.message);
                   }
                },
                // error: function (error) {
                //     alert("Произошла ошибка, проблема решается сист.администратором!");
                // }
     });
        $('input[name="userName"]').val("");
        $('input[name="password"]').val("");
});



