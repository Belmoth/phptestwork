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
      <section class="error__message">
        <h1>404 Ошибка</h1>
        <div>Данная страница не существует</div>
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