import axios from 'axios';
import { useEffect, useState } from 'react';
import { toast } from 'react-toastify';
import { ApiRoute } from '../../../const';
import { Button, Stack } from '@mui/material';
import { useNestedSet } from '../../../hooks/use-nested-set';

export default function TagsBoard() {
  const [tags, setTags] = useState(null);
  const [hierarchy, setHierarchy] = useState(null);
  const [changed, setChanged] = useState(false);
  const ref = useNestedSet((hierarchy) => {
    setHierarchy(hierarchy);
    setChanged(true);
  });

  useEffect(() => {
    !tags && axios
      .get(ApiRoute.Tags['index'])
      .then(({ data }) => {
        setTags(data);
      })
      .catch(({ response }) => toast.error(response.data.message));
  }, [tags]);

  const handleSaveButtonClick = () => {
    hierarchy && axios
      .post(ApiRoute.Tags['hierarchy'], { hierarchy })
      .then(({ data }) => {
        toast.success(data.message)
      })
      .catch(({ response }) => toast.error(response.data.message));
  };

  const handleCancelButtonClick = () => {
    setChanged(false);
    setTags(null);
  }

  return (
    <>
      <Stack direction="row" justifyContent="right" marginBottom={1} spacing={1}>
        <Button
          variant="contained"
          color="success"
          disabled={!changed}
          onClick={handleSaveButtonClick}
        >
          Сохранить
        </Button>
        <Button
          variant="contained"
          color="error"
          disabled={!changed}
          onClick={handleCancelButtonClick}
        >
          Отмена
        </Button>
      </Stack>

      <ol ref={ref} className="nested-list">
        {tags?.map(({ id, title, children}) => (
          <li
            key={id}
            className="nested-list__item"
            data-item={JSON.stringify({ id, title })}
          >
            <div className="nested-list__draggable">{title}</div>

            {children.length ?
              <ol>
                {children.map(({ id, title }) => (
                  <li
                    key={id}
                    className="nested-list__item"
                    data-item={JSON.stringify({ id, title })}
                  >
                    <div className="nested-list__draggable">{title}</div>
                  </li>
                ))}
              </ol> : ''
            }
          </li>
        ))}
      </ol>
    </>
  );
}
