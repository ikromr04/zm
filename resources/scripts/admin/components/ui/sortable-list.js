import React, { useEffect, useState } from "react";
import { Container, Draggable } from "react-smooth-dnd";
import { arrayMoveImmutable } from 'array-move';
import { List, ListItem, ListItemText } from "@mui/material";
import { ApiRoute } from "../../const";
import axios from "axios";
import { toast } from "react-toastify";

export default function SortableList() {
  const [items, setItems] = useState([]);

  useEffect(() => {
    axios
      .get(ApiRoute.Groups['index'])
      .then(({ data }) => {
        setItems(data.map(({ id, title }) => ({ id, title })));
      })
      .catch(({ response }) => toast.error(response.data.message));
  }, []);

  const onDrop = ({ removedIndex, addedIndex }) => {
    const newSort = arrayMoveImmutable(items, removedIndex, addedIndex);

    axios
      .post(ApiRoute.Groups['sort'], {
        sort: newSort.map(({id}) => id),
      })
      .then(({ data }) => {
        console.log(data);
        toast.success(data.message);
        setItems(items => arrayMoveImmutable(items, removedIndex, addedIndex));
      })
      .catch(({ response }) => toast.error(response.data.message));
  };

  return (
    <List>
      <Container dragHandleSelector=".drag-handle" lockAxis="y" onDrop={onDrop}>
        {items.map(({ id, title }) => (
          <Draggable key={id}>
            <ListItem
              className="drag-handle"
              sx={{ backgroundColor: 'white', borderRadius: 1, marginBottom: '2px' }}
            >
              <ListItemText primary={title} />
            </ListItem>
          </Draggable>
        ))}
      </Container>
    </List>
  );
};
