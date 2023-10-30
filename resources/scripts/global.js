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
