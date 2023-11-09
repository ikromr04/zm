import './modules/page-header.js';
import './modules/search-modal.js';

window.closeModal = (evt, modal) => {
  if (evt.target.classList.contains('modal') || evt.target.classList.contains('modal__close')) {
    modal.remove();
  }
};

window.clearError = (input) => {
  input.closest('.field').removeAttribute('data-error');
};

// window.addToFavorite = (evt) => {
//   const quoteId = localStorage.getItem('quote_id');
//   const favoriteId = evt.target.dataset.favoriteId;

//   if (evt.target.checked) {
//     evt.target.setAttribute('disabled', 'disabled');

//     axios.post('/favorites', {
//       favoriteId,
//       quoteId
//     })
//       .then(() => {
//         const button = document.querySelector(`[data-quote-id="${quoteId}"]`);
//         document.querySelector('.modal--favorites').classList.add('modal--hidden');
//         button.setAttribute('onclick', 'window.removeFavorite(event)');
//         button.classList.add('quote-card__button--favorite');
//         evt.target.removeAttribute('disabled');
//         evt.target.checked = false;
//       })
//       .catch((error) => {
//         console.error(error.response.data.message);
//         evt.target.removeAttribute('disabled');
//       })
//   }
// };

// window.removeFavorite = (evt) => {
//   evt.target.classList.remove('quote-card__button--favorite');
//   const quoteId = evt.target.dataset.quoteId;

//   axios.delete(`/favorites/quotes/${quoteId}`)
//     .then(() => {
//       evt.target.setAttribute('onclick', 'window.showFavoriteList(event)');
//       evt.target.classList.remove('quote-card__button--favorite');
//     })
//     .catch((error) => {
//       console.error(error.response.data.message);
//     })
// };
