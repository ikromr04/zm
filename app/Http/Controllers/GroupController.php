<?php

namespace App\Http\Controllers;

use App\Models\TagsGroup;
use Illuminate\Http\Request;

class GroupController extends Controller
{
  public function get()
  {
    try {
      return TagsGroup::orderBy('title', 'asc')->get();
    } catch (\Throwable $th) {
      return response([
        'message' => 'Не удалось найти данные',
        'error' => $th,
      ]);
    }
  }
}
