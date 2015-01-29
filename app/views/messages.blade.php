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
      <table class="messages">
        <tr class="message_tr message_main_line">
          <td class="message__from">FROM: </td>
          <td class="message__text">MESSAGE TEXT: </td>
        </tr>

        @foreach ($messages as $message)
        <tr class="message_tr">
          <td> {{{ $message->user_from }}} </td>
          <td> {{{ $message->text }}} </td>
        </tr>   
        @endforeach
      </table>
    </div>

    <footer class="footer">
      <p class="copyright">
        Sasha Bichkov &copy;
      </p>
    </footer>  
  </div>
</body>
</html>