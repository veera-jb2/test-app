/*** Form Error Reset method ***/
function FormErrorReset() {
    $('[class$=_form_error]').each(function () {
        $(this).addClass("d-none");
        $(this).find("strong").html("");
    });
    
}

/*** Register Form Submit ***/
$(document).on('click','#submit',function(e){
	var url = apiBaseURL + '/api/register';
    var first_name = $("#first_name").val();
    var last_name = $("#last_name").val();
    var email = $("#email").val();
    var password = $("#password").val();
    var password_confirmation = $("#password_confirmation").val();
    var postedData = { first_name : first_name, last_name : last_name, email : email , password : password, password_confirmation : password_confirmation };
    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
    var loginData = { email : email, password : password };
    var login_url = apiBaseURL + "/api/login";

    $.ajax({
        type: 'POST',
        url: url,
        data: postedData,
        dataType: 'json',
        success: function (result) {
           if (result.status == "success") {
            $.ajax({
                type: 'POST',
                url: login_url,
                data: loginData,
                dataType: 'json',
                success: function (result) {
                    localStorage.setItem("token", result.data.access_token);
                    localStorage.setItem("user", result.data.user);
                    localStorage.setItem("role",result.data.role);
                    window.location.href = apiBaseURL+"/dashboard";
                },
            });
        }
        },
         error: function(error) {
            FormErrorReset();
            var json = JSON.parse(error.responseText);
            if ('data' in json) {
                for (var key in json.data) {
                    $("." + key + "_form_error").removeClass("d-none");
                    $("." + key + "_form_error").css('display', 'block');
                    $("." + key + "_form_error").find("strong").html(json.data[key][0]);
                }
            }
            if ('status' in json) {
                $(".failure_form_error").removeClass("d-none");
                $(".failure_form_error").css('display', 'block');
                $(".failure_form_error").find("strong").html(json.message);
            }
        }
    });
});