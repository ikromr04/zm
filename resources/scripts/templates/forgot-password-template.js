export const getForgotPasswordTemplate = () => `
  <section class="modal" onclick="window.closeModal(event, this)">
    <div class="modal__container">
      <h2 class="modal__title title title--secondary">Сброс пароля</h2>
      <p class="modal__text text">Забыли пароль? Без проблем. Просто предоставьте нам свой адрес электронной почты, и мы вышлем вам ссылку, которая позволит вам выбрать новый.</p>

      <form class="form">
        <div class="field">
          <label class="field__label">
            <span class="visually-hidden">Электронная почта</span>
            <input class="field__input" name="email" type="email" placeholder="Введите адрес эл. почты" oninput="window.clearError(this)">
          </label>
        </div>

        <button class="form__submit button button--secondary" type="submit" onclick="window.sendResetLink(event)">
          Отправить
        </button>
      </form>

      <button class="modal__close" type="button" title="Закрыть окно">
        <svg width="11" height="10">
          <use xlink:href="/images/stack.svg#close" />
        </svg>
      </button>

      <button class="modal__back" type="button" onclick="window.handleForgotBack(event)">
        <svg width="18" height="12">
          <use xlink:href="/images/stack.svg#back" />
        </svg>
        Назад
      </button>
    </div>
  </section>
`;
