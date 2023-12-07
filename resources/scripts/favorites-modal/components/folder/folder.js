import React from 'react'
import style from './style.module.css'

function Folder({ folder, setFolders }) {
  const handleClick = () => {
    setFolders((prevFolders) => {
      return prevFolders.map((prevFolder) => {
        if (prevFolder.id == folder.id) {
          return {
            ...prevFolder,
            isChecked: !prevFolder.isChecked
          }
        }
        return prevFolder
      })
    })
  }

  const handleChildClick = (id) => () => {
    setFolders((prevFolders) => {
      return prevFolders.map((prevFolder) => {
        if (prevFolder.id == folder.id) {
          return {
            ...folder,
            children: folder.children.map((child) => {
              if (child.id == id) {
                return {
                  ...child,
                  isChecked: !child.isChecked
                }
              }
              return child
            })
          }
        }
        return prevFolder
      })
    })
  }

  return (
    <>
      <div className={style.folder} onClick={handleClick}>
        {folder?.isChecked
          ?
            <svg width="24" height="24">
              <use xlinkHref="/images/stack.svg#checked" />
            </svg>
          :
            <svg width="24" height="24">
              <use xlinkHref="/images/stack.svg#unchecked" />
            </svg>}
        {folder.title}
      </div>
      {folder?.children?.map((folder) => (
        <div key={folder.id} className={style.child} onClick={handleChildClick(folder.id)}>
          {folder?.isChecked
            ?
              <svg width="24" height="24">
                <use xlinkHref="/images/stack.svg#checked" />
              </svg>
            :
              <svg width="24" height="24">
                <use xlinkHref="/images/stack.svg#unchecked" />
              </svg>}
          {folder.title}
        </div>
      )).reverse()}
    </>
  )
}

export default Folder
