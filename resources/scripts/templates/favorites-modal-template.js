export const getFavoritesModalTemplate = (folders, quote, all) => `
  <section class="modal" onclick="window.closeModal(event, this, true)">
    <div class="modal__container">
      <h2 class="modal__title title title--secondary">Выберите папку</h2>

      <div class="favorite-list">
        <label class="favorite-list__item">
          <input class="visually-hidden" type="checkbox" value="" ${all ? 'checked' : ''}>
          <span class="favorite-list__icon">
            <svg width="16" height="16">
              <use xlink:href="/images/stack.svg#check" />
            </svg>
          </span>
          Все избранное
        </label>
        ${folders?.map((folder) => (`
          <label class="favorite-list__item">
            <input class="visually-hidden" type="checkbox" value="${folder.id}" ${folder.checked ? 'checked' : ''}>
            <span class="favorite-list__icon">
              <svg width="16" height="16">
                <use xlink:href="/images/stack.svg#check" />
              </svg>
            </span>
            ${folder.title}
          </label>
          ${folder?.children?.map((folder) => (`
            <label class="favorite-list__item favorite-list__item--child">
              <input class="visually-hidden" type="checkbox" value="${folder.id}" ${folder.checked ? 'checked' : ''}>
              <span class="favorite-list__icon">
                <svg width="16" height="16">
                  <use xlink:href="/images/stack.svg#check" />
                </svg>
              </span>
              ${folder.title}
            </label>
          `)).join('')}
        `)).join('')}
      </div>

      <button class="button button--secondary" type="button" data-quote-id="${quote.id}" style="max-width: none; margin-top: 32px;" onclick="window.addToFavorites(event)">
        Сохранить
      </button>

      <button class="modal__close" type="button" title="Закрыть окно">
        <svg width="11" height="10">
          <use xlink:href="/images/stack.svg#close" />
        </svg>
      </button>
    </div>
  </section>
`;
