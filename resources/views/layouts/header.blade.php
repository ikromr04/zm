<header class="page-header">
  <div class="page-header__container container">
    <x-main-logo />

    <x-main-navigation />

    @if (session('user'))
      <x-profile />
    @else
      <button
        class="login-link"
        type="button"
      >
        <svg
          class="main-navigation__link-icon"
          width="20"
          height="20"
        >
          <use xlink:href="{{ asset('images/stack.svg') }}#user" />
        </svg>
        Вход
      </button>
    @endif
  </div>

  <template id="menu-toggler">
    <button class="page-header__button" type="button" aria-label="Переключить меню">
      <svg width="18" height="12">
        <use xlink:href="{{ asset('images/stack.svg') }}#menu" />
      </svg>
    </button>
  </template>
</header>

<x-login-modal />
<x-register-modal />
<x-forgot-modal />
