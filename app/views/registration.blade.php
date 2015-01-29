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
      <section class="registration">
        <h1 class="registration__text">Регистрация</h1>
        @if($errors->any())
          {{ implode('', $errors->all('<li class="error">:message</li>')) }}
        @endif
        {{ Form::open(array('url'=>'registration', 'method' => 'post')) }}
          {{ Form::label('lastname','Фамилия') }}
          {{ Form::text('lastname','') }}

          {{ Form::label('firstname','Имя') }}
          {{ Form::text('firstname','') }}

          {{ Form::label('patronymic','Отчество') }}
          {{ Form::text('patronymic','') }}

          {{ Form::label('nickname','Никнейм') }}
          {{ Form::text('nickname','') }}

          {{ Form::label('email','Адрес почты') }}
          {{ Form::email('email','') }}

          {{ Form::label('password-1','Пароль') }}
          {{ Form::password('password-1','') }}

          {{ Form::label('password-2','Пароль ещё раз') }}
          {{ Form::password('password-2','') }}

          {{ Form::submit('Зарегистрироваться') }}
        {{ Form::close() }}
      </section>
    </div>

    <footer class="footer">
      <p class="copyright">
        Sasha Bichkov &copy;
      </p>
    </footer>  
  </div>
</body>
</html>

<!-- Log::info('Вот кое-какая полезная информация.'); -->