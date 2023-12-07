import { useState } from 'react'
import style from './style.module.css'
import axios from 'axios'

function Folder(props) {
  const [folder, setFolder] = useState(props.folder)
  const [isEditable, setIsEditable] = useState(false)
  const [title, setTitle] = useState(folder.title)
  const [isDeleting, setIsDeleting] = useState(false)

  const handleFormSubmit = (evt) => {
    evt.preventDefault()
    axios.post('/favorites/update', { id: folder.id, title })
      .then(() => {
        setFolder({ ...folder, title })
        setIsEditable(false)
      })
      .catch((error) => console.error(error));
  }

  const handleDeleteClick = () => {
    axios.delete(`/favorites/${folder.id}`)
      .then(() => {
        props.setFolders((folders) => folders.filter(({ id }) => id != folder.id))
      })
      .catch((error) => console.error(error));
  }

  return (
    <>
      <div className={style.folder}>
        {isEditable
          ?
            <form className={style.link} onSubmit={handleFormSubmit}>
              <svg className={style.icon} width={24} height={24}>
                <use xlinkHref="/images/stack.svg#folder" />
              </svg>
              ({folder.quotes?.length})

              <input
                className={style.input}
                value={title}
                onChange={(evt) => setTitle(evt.target.value) }
                autoFocus/>

              <button className={`${style.button} ${style.buttonSuccess}`} type="submit">
                <svg width={24} height={24}>
                  <use xlinkHref="/images/stack.svg#check" />
                </svg>
                <span className={style.info}>Редактировать</span>
              </button>
              <button
                className={`${style.button} ${style.buttonError}`}
                type="button"
                onClick={() => setIsEditable(false)}
              >
                <svg width={24} height={24}>
                  <use xlinkHref="/images/stack.svg#cancel" />
                </svg>
                <span className={style.info}>Отмена</span>
              </button>
            </form>
          :
            <a className={style.link} href={`/favorites/${folder.id}`}>
              <svg className={style.icon} width={24} height={24}>
                <use xlinkHref="/images/stack.svg#folder" />
              </svg>
              ({folder.quotes?.length}) {folder.title}
            </a>
          }

        {!isEditable &&
          <button className={style.button} type="button" onClick={() => setIsEditable(true)}>
            <svg width={24} height={24}>
              <use xlinkHref="/images/stack.svg#rename" />
            </svg>
            <span className={style.info}>Переименовать</span>
          </button>}
        <button className={style.button} type="button" onClick={() => setIsDeleting(true)}>
          <svg width={24} height={24}>
            <use xlinkHref="/images/stack.svg#delete" />
          </svg>
          <span className={style.info}>Удалить папку</span>
        </button>
        <button className="button button--secondary" type="button">
          Создать подпапку
        </button>
      </div>
      {isDeleting &&
        <section className="modal">
          <div className="modal__container">
            <p className="modal__text text">
              {`Вы уверены что хотите удалить папку "${folder.title}"?`}
            </p>
            <div className="form">
              <button
                className="form__submit button button--secondary"
                type="button"
                onClick={handleDeleteClick}
              >
                Удалить
              </button>
            </div>
            <button
              className="modal__close"
              type="button"
              title="Закрыть окно"
              onClick={() => setIsDeleting(false)}
            >
              <svg width={11} height={10}>
                <use xlinkHref="/images/stack.svg#close" />
              </svg>
            </button>
          </div>
        </section>}
    </>
  )
}

export default Folder
