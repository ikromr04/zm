import { Breadcrumbs, Link, Typography } from '@mui/material';
import React from 'react'
import { AppRoute } from '../../../const';
import GroupsBoard from '../../ui/groups-board';

function GroupsPage() {
  return (
    <>
      <Typography component="h1" variant="h4">Группы</Typography>

      <Breadcrumbs aria-label="breadcrumb">
        <Link underline="hover" color="inherit" href={AppRoute.Index}>Сайт</Link>

        <Link underline="hover" color="inherit">Админ панель</Link>

        <Typography color="text.primary">Группы</Typography>
      </Breadcrumbs>

      <GroupsBoard />
    </>
  );
}

export default GroupsPage;
