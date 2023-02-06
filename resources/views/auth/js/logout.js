function logout(){
	var url = apiBaseURL + "/api/logout";
  var logout_url = apiBaseURL+ "/logout";
	$.ajax({
        type: 'POST',
        url: url,
        dataType: 'json',
        headers: {
          "Authorization": "Bearer " + localStorage.getItem('token')
        },
        success: function (result) {
         window.location.href = apiBaseURL+"/login";   
        },
        error: function(error) {
          var json = JSON.parse(error.responseText);
          if(json.message == "Unauthenticated." || json.message == "unauthorized"){
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