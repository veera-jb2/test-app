$(document).ready(function () {
    var list_url = apiBaseURL + '/api/task';
    tasks_list(list_url);
  });

  var project_id = $("#project_id").val();

  var logout_url = apiBaseURL+ "/logout";
  var project_list_url = apiBaseURL+ "/"+project_id+"/task";
 
  function tasks_list(url){
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    var postedData = { project_id : project_id };
    $.ajax({
      type: 'GET',
      url: url,
      data: postedData,
      dataType: 'json',
      headers: {
            "Authorization": "Bearer " + localStorage.getItem('token')
          },
      success: function (result) {
        console.log(result);
          $('#tasks_table').empty();
          var html = '';
          var role = localStorage.getItem('role');
          $.each(result.data.taskList, function (key, value) {
            if(role == "member"){
                html += '<tr><td class="text-left">'+value.task_name+'</td><td>'+value.status+'</td><td></td></tr>';
            }else{
                html += '<tr><td class="text-left">'+value.task_name+'</td><td>'+value.status+'</td><td><a href="'+apiBaseURL+'/'+value.project_id+'/task/edit/'+value.id+'"><button class="mdc-button mdc-button--raised icon-button filled-button--success"><i class="material-icons mdc-button__icon">colorize</i></button></a><a href="javascript:void(0);" onclick="deleteTask('+value.id+')"><button class="mdc-button mdc-button--raised icon-button filled-button--danger"><i class="material-icons mdc-button__icon">delete</i></button></a>'+'</td></tr>';
            }
          });
          $('#tasks_table').html(html);        
      },
      error: function(error) {
        var json = JSON.parse(error.responseText);
        console.log(json);
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
  }

  function deleteTask(id){
    var delete_url = apiBaseURL+"/api/task/"+id;
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
      type: 'DELETE',
      url: delete_url,
      dataType: 'json',
      headers: {
            "Authorization": "Bearer " + localStorage.getItem('token')
          },
      success: function (result) {
        if(result.status == "success"){
          window.location.href = project_list_url;
        }
        
      },
      error: function(error) {
        var json = JSON.parse(error.responseText);
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
  }
  