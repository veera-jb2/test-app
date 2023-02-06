$(document).ready(function () {
    var list_url = apiBaseURL + '/api/project';
    projects_list(list_url);
  });
  var logout_url = apiBaseURL+ "/logout";
 
  function projects_list(url){
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
      type: 'GET',
      url: url,
      dataType: 'json',
      headers: {
            "Authorization": "Bearer " + localStorage.getItem('token')
          },
      success: function (result) {
        console.log(result);
          $('#projects_table').empty();
          var html = '';
          var role = localStorage.getItem('role');
          $.each(result.data.projectList, function (key, value) {
            if( role == "member"){
                html += '<tr><td class="text-left"><a href="'+apiBaseURL+'/'+value.id+'/task">'+value.project_name+'</a></td><td>'+value.completed_tasks+'</td><td>'+value.incomplete_tasks+'</td><td>'+value.invited_members+'</td></tr>';

            }else{
                html += '<tr><td class="text-left"><a href="'+apiBaseURL+'/'+value.id+'/task">'+value.project_name+'</a></td><td>'+value.completed_tasks+'</td><td>'+value.incomplete_tasks+'</td><td>'+value.invited_members+'</td><td><a href="'+apiBaseURL+'/invite/team/'+value.id+'">Invite Meber</a></td></tr>';

            }
          });
          $('#projects_table').html(html);        
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
  