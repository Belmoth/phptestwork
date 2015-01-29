<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>ТЕСТОВОЕ ЗАДАНИЕ</title>
  {{ HTML::style('css/reset.css') }}
  {{ HTML::style('css/style.css') }}
  <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800&subset=latin,cyrillic-ext">
</head>
<body>
  <div class="wrapper">
    <header class="header">
      <p class="logo_text">
        Test Work
      </p>
    </header>

    <div class="content">
      <div class="auth">
        <p class="auth__text">
          Welcome!
        </p>
        @if($errors->any())
          {{ implode('', $errors->all('<li class="error">:message</li>')) }}
        @endif
        {{ Form::open(array('url'=>'auth/', 'method' => 'post')) }}
          {{ Form::label('email','Почтовый адрес') }}
          {{ Form::text('email','') }}

          {{ Form::label('password', 'Пароль') }}
          {{ Form::password('password', '') }}

          {{ Form::submit('Войти') }}
        {{ Form::close() }}

        {{ HTML::link('/registration', 'зарегистрироваться', array('class' => 'auth__regist')) }}
      </div>
    </div>

    <footer class="footer">
      <p class="copyright">
        Sasha Bichkov &copy;
      </p>
    </footer>  
  </div>
</body>
</html>