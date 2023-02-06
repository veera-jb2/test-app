jQuery(document).ready(function() {
    jQuery('#submit').click(function(e) {
        var url = apiBaseURL + "/api/login";
        var email = $("#email").val();
        var password = $("#password").val();
        var postedData = { email : email , password : password };
       $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
        $.ajax({
            type: 'POST',
            url: url,
            data: postedData,
            dataType: 'json',
            success: function (result) {
                localStorage.setItem("token", result.data.access_token);
                localStorage.setItem("user", result.data.user);
                localStorage.setItem("role",result.data.role);
                window.location.href = apiBaseURL+"/dashboard";
            },
             error: function(error) {
              FormErrorReset();
             var json = JSON.parse(error.responseText);
              if ('data' in json) {
                for (var key in json.data) {
                  if (json.data.token) {
                    $("." + key + "_form_error").removeClass("d-none");
                    $("." + key + "_form_error").css('display', 'block');
                    $("." + key + "_form_error").find("strong").html(json.data[key]);
                  } else {
                    $("." + key + "_form_error").removeClass("d-none");
                    $("." + key + "_form_error").css('display', 'block');
                    $("." + key + "_form_error").find("strong").html(json.data[key][0]);
                  }
                }
              }
            }
        });
    });
    });
    
    function FormErrorReset() {
        $('[class$=_form_error]').each(function() {
          $(this).addClass("d-none");
          $(this).find("strong").html("");
        });
    }
    
    /*** Password Show toogle function ***/
    $(document).on('click','#password-field',function(e){
    var x = document.getElementById("password");
      if (x.type === "password") {
        $(this).toggleClass("fa-eye fa-eye-slash");
        x.type = "text";
      } else {
        $(this).toggleClass("fa-eye fa-eye-slash");
        x.type = "password";
      }
    });
    