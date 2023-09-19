import { DataGrid } from '@mui/x-data-grid';
import axios from 'axios';
import { useEffect, useState } from 'react';
import { Stack } from '@mui/system';
import { toast } from 'react-toastify';
import { ApiRoute, dataGridLocalText } from '../../const';
import { generatePath } from 'react-router-dom';
import {
  Box,
  Button,
  Grid,
  TextField
} from '@mui/material';
import SortableList from './sortable-list';

export default function GroupsBoard() {
  const [rows, setRows] = useState([]);
  const [selection, setSelection] = useState([]);

  useEffect(() => {
    axios
      .get(ApiRoute.Groups['index'])
      .then(({ data }) => {
        setRows(data.map(({ id, title }) => ({ id, title })));
      })
      .catch(({ response }) => toast.error(response.data.message));
  }, []);

  const handleDeleteButtonClick = (id, title) => () => {
    const isConfirmed = window.confirm(
      `Вы уверены что хотите безвозвратно удалить ${title}?`
    );

    isConfirmed &&
      axios
        .delete(generatePath(ApiRoute.Groups['delete'], { id }))
        .then(({ data }) => {
          toast.success(data.message);
          setRows([...rows.filter((row) => row.id !== id)]);
        })
        .catch((error) => console.log(error));
  };

  const handleFormSubmit = (evt) => {
    evt.preventDefault();

    axios
      .post(ApiRoute.Groups['store'], {
        title: evt.target.title.value,
      })
      .then(({ data }) => {
        toast.success(data.message);
        setRows([data.group, ...rows])
        evt.target.reset();
      })
      .catch(({ response }) => toast.error(response.data.message));
  };

  const handleProcessRowUpdate = (newRow) => {
    axios
      .post(ApiRoute.Groups['update'], newRow)
      .then(({ data }) => toast.success(data.message))
      .catch((error) => console.log(error));

    return newRow;
  }

  const handleDeleteSelectedButtonClick = () => {
    window.confirm(
      `Вы уверены что хотите безвозвратно удалить выбранные?
      \nВыбрано ${selection.length}`
    ) &&
      axios
        .post(ApiRoute.Groups['multidelete'], { ids: selection })
        .then(() => setRows([...rows.filter((row) => !selection.includes(row.id))]))
        .catch((error) => console.log(error));
  };

  const columns = [
    {
      field: 'id',
      headerName: 'ID',
      align: 'center',
      headerAlign: 'center',
      width: 80,
    },
    {
      field: 'title',
      headerName: 'Название',
      width: 320,
      editable: true,
    },
    {
      field: 'actions',
      headerName: 'Действия',
      width: 120,
      align: 'right',
      headerAlign: 'center',
      renderCell: (params) => (
        <Stack spacing={1} direction="row" alignItems="center">
          <Button
            variant="contained"
            color="error"
            size="small"
            onClick={handleDeleteButtonClick(params.row.id, params.row.title)}
          >
            Удалить
          </Button>
        </Stack>
      ),
    },
  ];

  return (
    <Grid container spacing={2} marginTop={0}>
      <Grid item xs={7}>
        <Stack direction="row" justifyContent="right" marginBottom={1} spacing={1}>
          <Button
            variant="contained"
            color="error"
            disabled={!selection.length}
            onClick={handleDeleteSelectedButtonClick}
          >
            Удалить выбранные ({selection.length})
          </Button>
        </Stack>
        <Box
          component="form"
          sx={{
            padding: 2,
            backgroundColor: 'white',
            borderRadius: 1,
            display: 'flex',
            gap: 1,
            marginBottom: 1,
          }}
          onSubmit={handleFormSubmit}
        >
          <TextField
            fullWidth
            name="title"
            type="text"
            label="Название"
            placeholder="Введите название категории"
            required
            size="small"
          />

          <Button
            type="submit"
            color="success"
            variant="contained"
            sx={{ width: '160px', padding: '0 32px' }}
          >
            Добавить
          </Button>
        </Box>

        <DataGrid
          sx={{ backgroundColor: 'white' }}
          autoHeight
          rows={rows}
          columns={columns}
          pageSize={20}
          rowsPerPageOptions={[20]}
          checkboxSelection
          disableSelectionOnClick
          experimentalFeatures={{ newEditingApi: true }}
          localeText={dataGridLocalText}
          onSelectionModelChange={(newSelectionModel) => setSelection(newSelectionModel)}
          processRowUpdate={handleProcessRowUpdate}
          getRowHeight={() => 'auto'}
        />
      </Grid>
      <Grid item xs={5}>
        <SortableList />
      </Grid>
    </Grid>
  );
}
