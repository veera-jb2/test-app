
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Collaboration Mail</title>
</head>
<style type="text/css">
  #password-block p, #password-block h1, #password-block h2, #password-block h3, #password-block h4, #password-block h5, #password-block h6{
}
</style>
<body>
  <table cellspacing="0" cellpadding="0" width="100%" style="margin: auto;"> 
    <tr>
      <td style="width:100%;font-family:Arial, Helvetica, sans-serif;">
       <div id="password-block">
       <p style="margin: 10px 0; padding: 0 15px; font-size: 18px; "><strong>Hello {{ $user_name }}!</strong></p>
       <p style="margin: 10px 0; padding: 0 15px;font-size: 16px; ">{{ $loggin_user }} is added you to collaborate for the Project {{ $project_name }}</p>
       <p style="margin: 10px 0; padding: 0 15px; font-size: 16px; "><strong>Regards</strong></p>
       <h4 style="margin: 10px 0; padding: 0 15px 15px;font-size: 20px; ">Test Team</h4>
     </div>
      </td>
    </tr>
  </table>
  
</body>
</html>