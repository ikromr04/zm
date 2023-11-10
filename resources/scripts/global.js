import axios from 'axios';
import './modules/page-header.js';
import './modules/search-modal.js';
import { createElement } from './util.js';

window.closeModal = (evt, modal) => {
  if (evt.target.classList.contains('modal') || evt.target.classList.contains('modal__close')) {
    modal.remove();
  }
};

window.clearError = (input) => {
  input.closest('.field').removeAttribute('data-error');
};

window.showFavoriteModal = (evt) => {
  const quoteId = evt.target.dataset.quoteId;

  axios.post('/favorites/modal', { quote_id: quoteId })
    .then(({ data }) => {
      document.body.append(createElement(data));
    })
    .catch(({ response }) => {
      console.error(response.data.message);
    })
};

window.addToFavorites = (evt) => {
  const inputs = evt.target.closest('.modal').querySelectorAll('input:checked');
  const ids = Array.from(inputs).map((input) => input.value);

  evt.target.setAttribute('data-loading', 'loading');

  axios.post('/favorites', {
    quote_id: evt.target.dataset.quoteId,
    ids,
  })
    .then(() => {
      window.location.reload();
      evt.target.removeAttribute('data-loading');
    })
    .catch(({ response }) => {
      console.error(response.data.message);
      evt.target.removeAttribute('data-loading');
    })
};
