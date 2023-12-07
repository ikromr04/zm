import style from './style.module.css'

function Folder({ folder }) {
  return (
    <a className={style.folder} href={`/favorites/${folder.id}`}>
      <svg width={24} height={24}>
        <use xlinkHref="/images/stack.svg#folder" />
      </svg>
      ({folder.quotes?.length}) {folder.title}
    </a>
  )
}

export default Folder
