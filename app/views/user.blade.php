<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>ТЕСТОВОЕ ЗАДАНИЕ</title>
  {{ HTML::style('css/reset.css') }}
  {{ HTML::style('css/style.css') }}
  <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800&subset=latin,cyrillic-ext">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</head>
<body>
  <div class="wrapper">
    <header class="header">
      <p class="logo_text">
        Test Work
      </p>
    </header>

    <div class="content">
      <div class="chat">
        <div class="chat__header">
          <p class="chat__text">Пользователи: {{{ count($users) }}}</p>
        </div>
        

          <div class="chat__body"> 
            <ul class="users">
              @foreach ($users as $user)
              <li class="user">
                <p class="user__nickname">{{{ $user->nickname }}}</p>   
              </li>   
              @endforeach
            </ul>
          </div>
  
      </div>

      <section class="profile">
        <h1 class="profile__fio">
          {{{ Auth::user()->lastname }}}
          {{{ Auth::user()->firstname }}}
          {{{ Auth::user()->patronymic }}}
        </h1>
        {{ HTML::link('/auth/logout', 'Выйти', array('class' => 'logout')) }}
        {{ HTML::image('images/Anonymous.jpg', 'avatar', array('class' =>'profile__avatar')) }}

        <div class="profile__inf">
          <ul>
            <li>
              <p class="profile__inf__data-1">Никенейм: </p>
              <p class="profile__inf__data-2">{{{ Auth::user()->nickname }}}</p>
            </li>

            <li>
              <p class="profile__inf__data-1">Mail: </p>
              <p class="profile__inf__data-2">{{{ Auth::user()->email }}}</p>
            </li>
            
            <li>
              <p class="profile__inf__data-1">Мои сообщения:</p>
              <p class="profile__inf__data-2">
                {{ HTML::link(URL::current().'/messages', 'смотреть')}}
                {{{ Auth::user()->messages }}}
              </p>
            </li>
          </ul>
        </div> 
      </section>
    </div>

    <footer class="footer">
      <p class="copyright">
        Sasha Bichkov &copy;
      </p>
    </footer>  
  </div>

  <script>
    $(function () {
      var Message = (function () {
        if ( !$('.message').length ) {
          console.log('bla');
          var message = 
              '<div class="message">'
            + '<p class="message__address">Кому: <span class="name"></span></p>'
            + '<textarea class="message__text"></textarea>'
            + '<button class="message__send">Отправить</button>'
            + '</div>';

          $('body').append(message);
          $('.message__send').on('click', function() {
            var text = $(this).parent().find('.message__text').val();
            var nickname = $(this).parent().find('.name').text();

            console.log( nickname );

            $.ajax({
              type: 'Post',
              url:  '{{URL::current()."/messages/send"}}',
              data: 'to=' + nickname + '&message_text=' + text,

              success: function (data) {
                $('.message').hide();
                alert('Сообщение отправлено!');
              }
            }); 
          });
        }

        var show = function ( nickname ) {
          $('.message__address .name').html( nickname );
          $('.message').show();
        };

        return {
          show: show
        }
      })();

      $('body').on('click', '.user__nickname', function() {
        var nickname = $(this).text();

        Message.show( nickname );
      });
    });
  </script>
</body>
</html>