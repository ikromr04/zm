import MainFolder from '../main-folder/main-folder'
import style from './style.module.css'
import Folder from '../folder/folder'
import CreateFolder from '../create-folder/create-folder'

function App() {
  window.showFavoriteModal = (evt) => {
    console.log(evt);
  }
  return (
    <div className={style.folders}>

    </div>
  )
}

export default App
