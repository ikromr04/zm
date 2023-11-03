import axios from 'axios';
import './modules/page-header.js';
import './modules/search-modal.js';

document.addEventListener('click', (evt) => {
  if (evt.target.closest('.login-link') || evt.target.closest('.main-navigation__link--login')) {
    const loginModal = document.querySelector('.modal--login');
    loginModal.classList.remove('modal--hidden');
  }

  if (evt.target.closest('.modal__close')) {
    evt.target.closest('.modal').classList.add('modal--hidden');''
  }

  if (evt.target.classList.contains('modal')) {
    evt.target.classList.add('modal--hidden')
  }

  if (evt.target.closest('[data-action="login"]')) {
    evt.preventDefault();
    evt.target.setAttribute('disabled', 'disabled');
    const form = evt.target.closest('form');

    axios.post('/auth/check', {
      login: form.email.value,
      password: form.password.value,
    })
      .then(() => {
        window.location.reload();
      })
      .catch((error) => {
        if (error.response.data.email) {
          form.querySelector('[name="email"]').closest('.field')
            .setAttribute('data-error', error.response.data.email);
        }
        if (error.response.data.password) {
          form.querySelector('[name="password"]').closest('.field')
            .setAttribute('data-error', error.response.data.password);
        }
        evt.target.removeAttribute('disabled');
      })
  }
});

window.clearError = (input) => {
  input.closest('.field').removeAttribute('data-error');
};

window.toggleProfileModal = () => {
  document.querySelector('.profile__modal').classList.toggle('profile__modal--hidden');
};

window.closeProfileModal = () => {
  document.querySelector('.profile__modal').classList.add('profile__modal--hidden');
};

window.updateUserAvatar = (input) => {
  const formData = new FormData();
  const userId = input.dataset.userId;
  formData.append('avatar', input.files[0]);

  axios
    .post(`/users/${userId}/avatar`, formData)
    .then(({ data }) => {
      document.querySelector('.profile__modal img').setAttribute('src', data);
    })
    .catch((error) => console.log(error.response));
};

window.handleNewUserClick = () => {
  document.querySelector('.modal--login').classList.add('modal--hidden');
  document.querySelector('.modal--register').classList.remove('modal--hidden');
};

window.handleRegisterBack = () => {
  document.querySelector('.modal--login').classList.remove('modal--hidden');
  document.querySelector('.modal--register').classList.add('modal--hidden');
};

window.handleRegisterButtonSubmit = (evt) => {
  evt.preventDefault();
  evt.target.setAttribute('disabled', 'disabled');
  const form = evt.target.closest('form');

  axios.post('/users/register', new FormData(form))
    .then(() => {
      window.location.reload();
    })
    .catch((error) => {
      if (error.response.data.name) {
        form.querySelector('[name="name"]').closest('.field')
          .setAttribute('data-error', error.response.data.name);
      }
      if (error.response.data.email) {
        form.querySelector('[name="email"]').closest('.field')
          .setAttribute('data-error', error.response.data.email);
      }
      if (error.response.data.password) {
        form.querySelector('[name="password"]').closest('.field')
          .setAttribute('data-error', error.response.data.password);
      }
      if (error.response.data.confirm_password) {
        form.querySelector('[name="confirm_password"]').closest('.field')
          .setAttribute('data-error', error.response.data.confirm_password);
      }
      evt.target.removeAttribute('disabled');
    })
}

window.handleForgotClick = () => {
  document.querySelector('.modal--login').classList.add('modal--hidden');
  document.querySelector('.modal--forgot').classList.remove('modal--hidden');
};

window.handleForgotBack = () => {
  document.querySelector('.modal--login').classList.remove('modal--hidden');
  document.querySelector('.modal--forgot').classList.add('modal--hidden');
};

window.sendResetLink = (evt) => {
  evt.preventDefault();
  evt.target.setAttribute('disabled', 'disabled');
  const form = evt.target.closest('form');
  const email = form.email.value;

  axios.post('/users/forgot-password', { email })
    .then(({ data }) => {
      form.previousElementSibling.classList.add('text--success')
      form.previousElementSibling.textContent = data.message;
      form.remove();
      evt.target.removeAttribute('disabled');
    })
    .catch((error) => {
      if (error.response.data.email) {
        form.querySelector('[name="email"]').closest('.field')
          .setAttribute('data-error', error.response.data.email);
      }
      evt.target.removeAttribute('disabled');
    })
}

window.addToFavorite = (evt) => {
  const quoteId = localStorage.getItem('quote_id');
  const favoriteId = evt.target.dataset.favoriteId;

  if (evt.target.checked) {
    evt.target.setAttribute('disabled', 'disabled');

    axios.post('/favorites', {
      favoriteId,
      quoteId
    })
      .then(() => {
        const button = document.querySelector(`[data-quote-id="${quoteId}"]`);
        document.querySelector('.modal--favorites').classList.add('modal--hidden');
        button.setAttribute('onclick', 'window.removeFavorite(event)');
        button.classList.add('quote-card__button--favorite');
        evt.target.removeAttribute('disabled');
        evt.target.checked = false;
      })
      .catch((error) => {
        console.error(error.response.data.message);
        evt.target.removeAttribute('disabled');
      })
  }
};

window.removeFavorite = (evt) => {
  evt.target.classList.remove('quote-card__button--favorite');
  const quoteId = evt.target.dataset.quoteId;

  axios.delete(`/favorites/quotes/${quoteId}`)
    .then(() => {
      evt.target.setAttribute('onclick', 'window.showFavoriteList(event)');
      evt.target.classList.remove('quote-card__button--favorite');
    })
    .catch((error) => {
      console.error(error.response.data.message);
    })
};
