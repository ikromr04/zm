import MainFolder from '../main-folder/main-folder'
import style from './style.module.css'

function App() {
  return (
    <div className={style.folders}>
      <button className="button button--secondary" type="button">
        Создать новую папку
      </button>

      <MainFolder />
    </div>
  )
}

export default App
