<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Reset </title>
  
  
  
      <link rel="stylesheet" href="{{asset('boxy-login/css/style.css')}}">

  
</head>

<body>
  <body>
  <div class="login">
    <div class="login-screen">
      <div class="app-title">
        <h1>Reset</h1>
      </div>
      {!! Form::open(['url'=>'/password/email']) !!}
      <div class="login-form">
        <div class="control-group">
        <input type="email" name="email" class="login-field" value="" placeholder="email" id="login-name">
        <label class="login-field-icon fui-user" for="login-name"></label>
        </div>

        <button type="submit" class="btn btn-primary btn-large btn-block"> Kirim Link Reset Password</button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</body>
  
  
</body>
</html>








