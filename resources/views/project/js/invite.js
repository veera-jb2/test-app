/*** Form Error Reset method ***/
function FormErrorReset() {
    $('[class$=_form_error]').each(function () {
        $(this).addClass("d-none");
        $(this).find("strong").html("");
    });
    
}

var logout_url = apiBaseURL+ "/logout";	
var project_list_url = apiBaseURL+ "/project";

/*** Register Form Submit ***/
$(document).on('click','#submit',function(e){
    var url = apiBaseURL + '/api/team/invite';
    var user_id = $("#member").val();
    var project_id = $("#project_id").val();
    var postedData = { user_id : user_id, project_id : project_id };
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
        headers: {
            "Authorization": "Bearer " + localStorage.getItem('token')
          },
        success: function (result) {
           if (result.status == "success") {
            window.location.href = apiBaseURL+'/project';
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
            if(json.message == "Unauthenticated." || json.message == "unauthorized" || json.message == "Token has expired"){
	            $.ajax({
	              type: 'GET',
	              url: logout_url,
	              dataType: 'json',
	              success: function (result) {
	                 window.location.href = apiBaseURL+"/login";   
	              },
                complete: function (result) {
                  window.location.href = apiBaseURL+"/login";  
                }
	            });
            }
        }
    });
});

function cancel(){
    window.location.href = project_list_url;
  }