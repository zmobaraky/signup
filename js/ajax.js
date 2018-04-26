$(document).ready(function() {
    $( document ).ready(function() {
        $('#login .submit_button').on('click',function () {
            if(login_validate())
            {}
        })
        function login_validate()
        {
            flag = true;
            message="";
            if($('#email').val().trim() == '' || $('#email').val() == null || !isEmail($('#email').val())) {
                $('#email').addClass('input_error');
                message+="The format of Email is not correct.";
                flag = false;
            }
            else  $('#email').removeClass('input_error');

            if($('#password').val().trim() == '' || $('#password').val() == null || $('#password').val().length<5) {
                $('#password').addClass('input_error');
                message+="The length of password should be more than 5 characters.";
                flag = false;
            }
            else  $('#password').removeClass('input_error');

            if(flag)
            {
                $('#msg').html('');
                var dataString = {};
                dataString['email'] = $("#email").val();
                dataString['password'] = $("#password").val();
                var jsonString = JSON.stringify(dataString);
                //console.log(jsonString);
                $.ajax({
                    type: "POST",
                    url: "index.php",
                    data: {data:jsonString,controller:'user',action:'login',from_ajax:true},
                    cache: false,
                    success: function(data){
                        if(data!="")
                        {
                            $('#msg').html(data);
                        }

                        else window.location.href = "http://localhost/login_signup/index.php";
                    },
                });

            }
            else
            {
                $('#msg').html(message);
            }
        }
        function isEmail(email) {
            var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            return regex.test(email);
        }

    });




})