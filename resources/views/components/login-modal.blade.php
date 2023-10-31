<section class="modal modal--login modal--hidden">
  <div class="modal__container">
    <h2 class="modal__title title title--secondary">Вход</h2>
    <p class="modal__text text">Войдите в свой аккаунт <br> или зарегистрируйтесь</p>

    <form class="form" >
      <div class="field">
        <label class="field__label">
          <span class="visually-hidden">Электронная почта</span>
          <input
            class="field__input"
            name="email"
            type="email"
            placeholder="Эл. почта"
            oninput="window.clearError(this)">
        </label>
      </div>
      <div class="field">
        <label class="field__label">
          <span class="visually-hidden">Пароль</span>
          <input
            class="field__input"
            name="password"
            type="password"
            placeholder="Пароль"
            oninput="window.clearError(this)">
        </label>
      </div>

      <div class="form__links">
        <a class="text" onclick="window.handleNewUserClick()">Новый пользователь?</a>
        <a class="text text--error" onclick="window.handleForgotClick()">Забыли пароль?</a>
      </div>

      <button
        class="form__submit button button--secondary"
        data-action="login"
        type="submit"
      >
        Войти
      </button>
    </form>

    <button class="modal__close" type="button" title="Закрыть окно">
      <svg width="11" height="10">
        <use xlink:href="{{ asset('images/stack.svg') }}#close" />
      </svg>
    </button>
  </div>
</section>
