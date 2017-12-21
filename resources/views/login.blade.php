<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>User Login - Agung Siaga</title>

    <!-- Bootstrap -->
    {!! Html::style('assets/bootstrap/dist/css/bootstrap.min.css') !!}
    <!-- Font Awesome -->
    {!! Html::style('assets/font-awesome/css/font-awesome.min.css') !!}
    <!-- NProgress -->
    {!! Html::style('assets/nprogress/nprogress.css') !!}
    <!-- Animate.css -->
    {!! Html::style('assets/animate.css/animate.min.css') !!}
    <!-- Custom Theme Style -->
    {!! Html::style('build/css/custom.min.css') !!}
  </head>
  <body class="login">
   <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>
      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            {!! Form::open(['url' => '/login']) !!}
              <h1>Agung Siaga</h1>
              <h1>User Panel - Agung Siaga</h1>
              @if(Session::has('message'))
                <span class="label label-danger">{{ Session::get('message') }}</span>
              @endif
              <div>
                {!! Form::text('email', '', ['placeholder' => 'Email', 'class' => 'form-control', 'required']) !!}
              </div>
              <div>
                {!! Form::password('password', ['placeholder' => 'Password', 'class' => 'form-control', 'required']) !!}
              </div>
              <div>
                {!! Form::submit('Login', ['class' => 'btn btn-default submit']) !!}
                {!! Form::reset('Reset', ['class' => 'btn btn-default submit']) !!}
              </div>


              <div class="clearfix"></div>

              <div class="separator">
                <div class="clearfix"></div>
                <br />

                <div>
                  <p>©2017 Agung Siaga</p>
                </div>
              </div>
            {!! Form::close() !!}
          </section>
        </div>
      </div>
    </div>
  </body>
</html>