<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Sistema Gestor Dircon">
    <meta name="author" content="Stratia Consultores">

    <title>Dircon Admin | Login</title>
    <link href="{{asset('public/pluings/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('public/css/login.css')}}">
    <link href="{{asset('public/pluings/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
</head>

<body>
<div class="container">
    <div class="row">

        <div class="text-center"><img src="{{asset('public/img/logo.png')}}" class="logo-sesion"></div></br>
        @if(count($errors) > 0)
            <div class="alert alert-warning mensajesAll" style="max-width: 500px; margin: auto; font-size: 14px">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                @foreach($errors->all() as $error)
                    <ul>
                        <li> {{ $error }} </li>
                    </ul>

                @endforeach
            </div>
        @endif
        <div id="login-form">

            <h1>Login</h1>

            <fieldset>
                {!! Form::open(['route'=>'admin.auth.login', 'method' => 'POST']) !!}
                <div class="form-group">
                {!! Form::text('username',null,['class' => 'form-control','placeholder'=>'usuario','required','autofocus']) !!}
                {!! Form::password('password',['class' => 'form-control','placeholder' => '****','required']) !!}
                {!! Form::text('status','activo',['class' => 'form-control hidden']) !!}
                </div>

                {!! Form::submit('Login') !!}

                    <footer class="clearfix hidden">
                        <p><span class="info">?</span><a href="#">Olvido su contraseña</a></p>
                    </footer>
                {!! Form::close() !!}
            </fieldset>

        </div>
    </div>
</div>

<script src="{{asset('public/pluings/jquery/jquery-3.1.1.js')}}"></script>
<script>
    setTimeout(function() {$(".mensajesAll").fadeOut(1500);},5000);
</script>
</body>

</html>
