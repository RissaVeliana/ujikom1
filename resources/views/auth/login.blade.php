<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Login Form</title>
  
  
  
      <link rel="stylesheet" href="{{asset('boxy-login/css/style.css')}}">

  
</head>

<body>
  <body>
  <div class="login">
    <div class="login-screen">
      <div class="app-title">
        <h1>Login</h1>
      </div>
      {!! Form::open(['url'=>'login']) !!}
      <div class="login-form">
        <div class="control-group">
        <input type="email" name="email" class="login-field" value="" placeholder="email" id="login-name">
        <label class="login-field-icon fui-user" for="login-name"></label>
        </div>

        <div class="control-group">
        <input type="password" name="password" class="login-field" value="" placeholder="password" id="login-pass">
        <label class="login-field-icon fui-lock" for="login-pass"></label>
        </div>

        <button type="submit" class="btn btn-primary btn-large btn-block">login</button>
        <a class="login-link" href="{{ url('/password/reset')}}">Lost your password?</a>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</body>
  
  
</body>
</html>
