<!DOCTYPE html>
<html class="page" lang="{{ app()->currentLocale() }}">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="robots" content="noindex">

  <link rel="icon" href="{{ asset('favicon.ico') }}">
  <link rel="icon" href="{{ asset('favicons/favicon.svg') }}" type="image/svg+xml">
  <link rel="apple-touch-icon" href="{{ asset('favicons/180x180.png') }}">
  <link rel="manifest" href="{{ asset('manifest.webmanifest') }}">
  <link rel="stylesheet" href="{{ asset('css/index.min.css') }}">

  <title>Авторский сайт Зафара Мирзо</title>
</head>

<body class="page__body">
  @include('layouts.header')

  @yield('content')

  @include('layouts.footer')

  <x-search-modal />

  @if (session('user'))
    <section class="modal modal--favorites modal--hidden">
      <div class="modal__container">
        <h2 class="modal__title title title--secondary">Выберите плейлист</h2>

        <ul class="add-favorite">
          <li>
            <label>
              <input
                type="checkbox"
                onchange="window.addToFavorite(event)"
              >
              Все избранное
            </label>
          </li>

          @foreach ($favorites as $favorite)
            <li>
              <label>
                <input
                  type="checkbox"
                  data-favorite-id="{{ $favorite->id }}"
                  onchange="window.addToFavorite(event)"
                >
                {{ $favorite->title }}
              </label>
            </li>
          @endforeach
        </ul>

        <button class="modal__close" type="button" title="Закрыть окно">
          <svg width="11" height="10">
            <use xlink:href="{{ asset('images/stack.svg') }}#close" />
          </svg>
        </button>
      </div>
    </section>
  @endif

  <script src="{{ asset('plugins/jquery/jquery-3.6.4.min.js') }}"></script>
  <script src="{{ asset('plugins/jquery/jquery-ui.min.js') }}"></script>
  <script src="{{ asset('plugins/jq-nested/jq-nested-sortable.js') }}"></script>
  @yield('scripts')
</body>

</html>
