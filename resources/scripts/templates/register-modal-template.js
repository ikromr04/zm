export const getRegisterModalTemplate = () => `
  <section class="modal" onclick="window.closeModal(event, this)">
    <div class="modal__container">
      <h2 class="modal__title title title--secondary">Регистрация</h2>
      <p class="modal__text text">Зарегистрируйтесь, чтобы получить доступ к авторскому ресурсу</p>

      <form class="form">
        <div class="field">
          <label class="field__label">
            <span class="visually-hidden">Имя</span>
            <input class="field__input" name="name" type="text" placeholder="Как вас зовут?" oninput="window.clearError(this)">
          </label>
        </div>
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
        <div class="field">
          <label class="field__label">
            <span class="visually-hidden">Пароль</span>
            <input class="field__input" name="confirm_password" type="password" placeholder="Подтвердите пароль" oninput="window.clearError(this)">
          </label>
        </div>

        <button class="form__submit button button--secondary" type="submit" onclick="window.register(event)">
          Войти
        </button>
      </form>

      <button class="modal__close" type="button" title="Закрыть окно">
        <svg width="11" height="10">
          <use xlink:href="/images/stack.svg#close" />
        </svg>
      </button>

      <button class="modal__back" type="button" onclick="window.handleRegisterBack(event)">
        <svg width="18" height="12">
          <use xlink:href="/images/stack.svg#back" />
        </svg>
        Назад
      </button>
    </div>
  </section>
`;
