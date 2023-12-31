import axios from 'axios'
import style from './style.module.css'

function CreateFolder({ setIsCreating, setFolders, setIsDisabled }) {
  const handleFormSubmit = (evt) => {
    evt.preventDefault()
    const title = evt.target.new_folder_name.value
    if (!title) {
      setIsCreating(false)
      setIsDisabled(false)
    } else {
      axios.post('/favorites/create', { title })
        .then(({ data }) => {
          setFolders((prevFolders) => {
            const index = prevFolders.findIndex(({ id }) => id == data.id)
            index < 0 && prevFolders.unshift({
              id: data.id,
              title: data.title,
              children: data.children,
              isChecked: true,
            })
            return prevFolders
          })
          setIsCreating(false)
          setIsDisabled(false)
        })
        .catch((error) => console.error(error))
    }
  }

  const handleInputBlur = (evt) => {
    const title = evt.target.value
    if (title) {
      axios.post('/favorites/create', { title })
        .then(({ data }) => {
          setFolders((prevFolders) => {
            const index = prevFolders.findIndex(({ id }) => id == data.id)
            index < 0 && prevFolders.unshift({
              id: data.id,
              title: data.title,
              children: data.children,
              isChecked: true,
            })
            return prevFolders
          })
          setIsCreating(false)
          setIsDisabled(false)
        })
        .catch((error) => console.error(error))
    } else {
      setIsCreating(false)
      setIsDisabled(false)
    }
  }

  return (
    <form className={style.folder} onSubmit={handleFormSubmit}>
      <svg width="24" height="24">
        <use xlinkHref="/images/stack.svg#unchecked" />
      </svg>
      <input
        className={style.input}
        placeholder="Введите название папки"
        name="new_folder_name"
        onBlur={handleInputBlur}
        autoFocus />
    </form>
  )
}

export default CreateFolder
