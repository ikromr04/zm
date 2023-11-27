export const getLoginModaltemplate = () => `
  <section class="modal modal--login" onclick="window.closeModal(event, this)">
    <div class="modal__container">
      <h2 class="modal__title title title--secondary">Вход</h2>
      <p class="modal__text text">Войдите в свой аккаунт <br> или зарегистрируйтесь</p>

      <form class="form">
        <div class="field">
          <label class="field__label">
            <span class="visually-hidden">Электронная почта</span>
            <input class="field__input" name="email" type="email" placeholder="Эл. почта" oninput="window.clearError(this)">
          </label>
        </div>
        <div class="field">
          <label class="field__label">
            <span class="visually-hidden">Пароль</span>
            <input class="field__input" name="password" type="password" placeholder="Пароль" oninput="window.clearError(this)">
          </label>
        </div>

        <div class="form__links">
          <a class="text" onclick="window.showRegisterModal()" style="cursor: pointer">Новый пользователь?</a>
          <a class="text text--error" onclick="window.showForgotPasswordModal()" style="cursor: pointer">Забыли пароль?</a>
        </div>
        <p class="form__aware">
          Авторизуясь, вы принимаете условия, изложенные в
          <a href="/terms-of-use">Пользовательском соглашении</a>
          и даете согласие на <a href="/privacy-policy">обработку персональных данных</a>.
        </p>

        <button class="form__submit button button--secondary" type="submit" onclick="window.login(event)">
          Войти
        </button>
      </form>

      <button class="modal__close" type="button" title="Закрыть окно">
        <svg width="11" height="10">
          <use xlink:href="/images/stack.svg#close" />
        </svg>
      </button>
    </div>
  </section>
`;
