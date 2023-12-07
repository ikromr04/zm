import { useEffect, useState } from 'react';
import style from './style.module.css'
import Folder from '../folder/folder';
import MainFolder from '../main-folder/main-folder';

function App() {
  const [folders, setFolders] = useState(JSON.parse(document.querySelector('#folders')?.dataset.value))
  const [isShown, setIsShown] = useState(false)
  const [isChecked, setIsChecked] = useState(false)

  window.showFavoriteModal = (evt) => {
    setIsShown(true)
  }

  useEffect(() => {
    setFolders(folders?.map(({ id, title, children }) => ({
      id, title, isChecked: false,
      children: children.map(({ id, title }) => ({
        id, title, isChecked: false
      }))
    })))
  }, [])

  if (!isShown) {
    return null
  }

  return (
    <section className="modal">
      <div className="modal__container">
        <h2 className="modal__title title title--secondary">Выберите папку</h2>

        <MainFolder isChecked={isChecked} setIsChecked={setIsChecked} />

        <div className={style.folders}>
          {folders?.map((folder) => (
            <Folder
              key={folder.id}
              setFolders={setFolders}
              folder={folder} />
          ))}
        </div>

        <button
          className="button button--secondary"
          type="button"
          style={{
            maxWidth: 'none',
            marginTop: '32px'
           }}
        >
          Сохранить
        </button>

        <button
          className="modal__close"
          type="button"
          title="Закрыть окно"
          onClick={() => setIsShown(false)}
        >
          <svg width={16} height={16}>
            <use xlinkHref="/images/stack.svg#close" />
          </svg>
        </button>
      </div>
    </section>
  )
}

export default App
