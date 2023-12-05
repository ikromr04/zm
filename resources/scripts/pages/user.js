import axios from 'axios';
import '../global.js';
import { getDeleteModaltemplate } from '../templates/delete-modal-template.js';
import { createElement } from '../util.js';

const favoritesMainEl = document.querySelector('.favorites__item--main')
const createFolderTemplate = document.querySelector('#create-new-folder')
const createFolderButtonEl = document.querySelector('[data-action="create-folder"]')

window.createFolder = () => {
  createFolderButtonEl.setAttribute('disabled', 'disabled')
  const element = createFolderTemplate.content.children[0].cloneNode(true)
  favoritesMainEl.insertAdjacentElement('afterend', element)
  element.querySelector('input').focus()
}

window.storeFolder = (evt) => {
  evt.preventDefault()
  const title = evt.target.foldername.value

  if (!title) {
    window.cancelCreateFolder()
  } else {
    axios.post('/favorites/create', { title })
      .then(() => {
        document.location.reload(true);
      })
      .catch((error) => console.error(error));
  }
}

window.cancelCreateFolder = () => {
  document.querySelector('.favorites__item--new').remove()
  createFolderButtonEl.removeAttribute('disabled')
}

window.handleRenameButtonClick = (evt) => {
  const cardEl = evt.target.closest('.favorites__card')
  const input = cardEl.querySelector('input')
  const value = input.value
  cardEl.classList.add('favorites__card--edit')
  input.focus()
  input.value = ''
  input.value = value
}

window.updateFolder = (evt) => {
  axios.post('/favorites/update', {
    id: evt.target.dataset.id,
    title: evt.target.value,
  })
    .then(() => {
      const cardEl = evt.target.closest('.favorites__card')
      cardEl.querySelector('.favorites__link-label').textContent = evt.target.value
      cardEl.classList.remove('favorites__card--edit')
    })
    .catch((error) => console.error(error));
};

window.createNewSubFolder = (evt) => {
  axios.post('/favorites/create', {
    title: 'Новая папка',
    parent_id: evt.target.dataset.id,
  })
    .then(({data}) => {
      document.location.reload(true);
    })
    .catch((error) => console.error(error));
}

window.showDeleteModal = (evt) => {
  const modal = createElement(getDeleteModaltemplate(evt.target.dataset.id));
  document.body.append(modal);
};

window.deleteFolder = (id) => {
  axios.delete(`/favorites/${id}`)
    .then(() => {
      document.location.reload(true);
    })
    .catch((error) => console.error(error));
};
