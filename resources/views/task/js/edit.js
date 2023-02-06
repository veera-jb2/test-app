/*** Form Error Reset method ***/
function FormErrorReset() {
    $('[class$=_form_error]').each(function () {
        $(this).addClass("d-none");
        $(this).find("strong").html("");
    });
    
}
var project_id = $("#project_id").val();

var logout_url = apiBaseURL+ "/logout";	
var project_list_url = apiBaseURL+ "/"+project_id+"/task";

/*** Register Form Submit ***/
$(document).on('click','#submit',function(e){
    var task_id = $("#task_id").val();
    var url = apiBaseURL + "/api/task/"+task_id;
    var task_name = $("#task_name").val();
    var task_status = $("#task_status").val();
    var postedData = { project_id : project_id , task_name : task_name, task_status : task_status };
    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
    $.ajax({
        type: 'PUT',
        url: url,
        data: postedData,
        dataType: 'json',
        headers: {
            "Authorization": "Bearer " + localStorage.getItem('token')
          },
        success: function (result) {
           if (result.status == "success") {
            window.location.href = project_list_url;
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