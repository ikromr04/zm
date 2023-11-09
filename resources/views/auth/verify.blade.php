<!DOCTYPE html>
<html class="page" lang="{{ app()->currentLocale() }}">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="robots" content="noindex">

  <link rel="icon" href="{{ asset('favicon.ico') }}">
  <link rel="icon" href="{{ asset('favicons/favicon.svg') }}" type="image/svg+xml">
  <link rel="apple-touch-icon" href="{{ asset('favicons/180x180.png') }}">
  <link rel="manifest" href="{{ asset('manifest.webmanifest') }}">
  <link rel="stylesheet" href="{{ asset('css/index.min.css') }}">

  <title>Вход | Авторский сайт Зафара Мирзо</title>
</head>

<body class="page__body">
  <section class="modal">
    <div class="modal__container">
      <h2 class="modal__title title title--secondary">Спасибо за регистрацию</h2>
      <p class="modal__text text">Прежде чем начать, не могли бы Вы подтвердить свой адрес электронной почты, перейдя по ссылке, которую мы только что отправили Вам по электронной почте? Если Вы не получили электронное письмо, мы с радостью вышлем Вам другое</p>

      <form class="form" >
        <button class="form__submit button button--secondary" type="submit">
          Выслать повторно
        </button>
        <div class="form__links">
          <a class="text" href="{{ route('auth.logout') }}">
            Выйти из аккаунта
          </a>
        </div>

      </form>
    </div>
  </section>

</body>

</html>
