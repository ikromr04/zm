import axios from 'axios';
import '../global.js';

const favorites = document.querySelector('.nested-favorites');

if (favorites) {
  // $('.nested-favorites').nestedSortable({
  //   handle: 'div',
  //   items: 'li',
  //   toleranceElement: '> div',
  //   excludeRoot: true,
  //   maxLevels: 2,
  //   isTree: true,
  //   expandOnHover: 700,
  //   startCollapsed: false,
  //   branchClass: 'nested-favorites__item--branch',
  //   expandedClass: 'nested-favorites__item--expanded',
  //   leafClass: 'nested-favorites__item--leaf',
  //   hoveringClass: 'nested-favorites__item--hover',
  // });
}

window.createNewFolder = (evt) => {
  axios.post('/favorites/create', {
    title: 'Новая папка',
  })
    .then(() => {
      document.location.reload(true);
    })
    .catch((error) => console.error(error));
}

window.createNewSubFolder = (evt) => {
  console.log(evt.target.dataset.id);
  axios.post('/favorites/create', {
    title: 'Новая папка',
    parent_id: evt.target.dataset.id,
  })
    .then(({data}) => {
      document.location.reload(true);
    })
    .catch((error) => console.error(error));
}

window.updateFavorite = (evt) => {
  axios.post('/favorites/update', {
    id: evt.target.dataset.id,
    title: evt.target.value,
  })
    .then(() => {
      evt.target.setAttribute('readonly', 'readonly');
    })
    .catch((error) => console.error(error));
};

window.renameFolder = (evt) => {
  const input = evt.target.closest('.nested-favorites__draggable').querySelector('input');
  input.removeAttribute('readonly');
  input.focus();
  const val = input.value;
  input.value = '';
  input.value = val;
};

window.deleteFolder = (evt) => {
  axios.delete(`/favorites/${evt.target.dataset.id}`)
    .then(() => {
      document.location.reload(true);
    })
    .catch((error) => console.error(error));
};
