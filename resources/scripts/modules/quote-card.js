// document.addEventListener('click', (evt) => {
//   if (evt.target.closest('.quote-card__button--toggle-tags')) {
//     evt.target.closest('.quote-card').classList.toggle('tags-hidden');
//   }
//   if (evt.target.closest('[aria-label="Скопировать"]')) {
//     const quote = evt.target.closest('blockquote').querySelector('q').textContent;
//     navigator.clipboard.writeText(quote)
//       .then(() => console.log('Text copied to clipboard'))
//       .catch((err) => console.error('Error in copying text: ', err));
//   }
// });

// window.showLoginModal = () => {
//   document.querySelector('.modal--login').classList.remove('modal--hidden');
// };

// window.showFavoriteList = (evt) => {
//   document.querySelector('.modal--favorites').classList.remove('modal--hidden');
//   localStorage.setItem('quote_id', evt.target.dataset.quoteId);
// };
