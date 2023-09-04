import { FormControl, MenuItem, Select } from '@mui/material'
import axios from 'axios';
import React, { useState } from 'react'
import { toast } from 'react-toastify';
import { ApiRoute } from '../../../const';

export default function Groups({ value, groups, row }) {
  const [id, setId] = useState(value);
  return (
    <FormControl fullWidth sx={{ padding: '16px 0' }}>
      <Select
        size="small"
        value={id}
        onChange={(evt) => {
          const newRow = { ...row, group_id: evt.target.value };
          axios
            .post(ApiRoute.Tags['update'], newRow)
            .then(({ data }) => {
              toast.success(data.message);
              setId(evt.target.value);
            })
            .catch((error) => console.log(error));
        }}
      >
        <MenuItem value={0}></MenuItem>
        {groups?.map(({ id, title }) => (<MenuItem key={id} value={id}>{title}</MenuItem>))}
      </Select>
    </FormControl>
  )
}
