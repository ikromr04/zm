<?php

namespace App\Http\Controllers;

use App\Models\Tag;
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

  public function store(Request $request)
  {
    try {
      $group = TagsGroup::where('title', $request->title)->first();
      if ($group) {
        return response(['message' => 'Группа уже существует'], 400);
      }
      $group = TagsGroup::create([
        'title' => $request->title,
      ]);

      return response([
        'group' => $group,
        'message' => 'Группа успешно добавлена',
      ], 200);
    } catch (\Throwable $th) {
      return $th;
    }
  }

  public function update(Request $request, TagsGroup $group)
  {
    $group = TagsGroup::find(request('id'));
    $group->title = request('title');

    try {
      $group->update();

      return response([
        'group' => $group,
        'message' => 'Группа успешно сохранен',
      ], 200);
    } catch (\Throwable $th) {
      return $th;
    }
  }

  public function destroy(TagsGroup $group)
  {
    try {
      foreach ($group->tags as $tag) {
        $tag = Tag::find($tag->id);
        $tag->group_id = NULL;
        $tag->update();
      }
      $group->delete();

      return response(['message' => 'Группа успешно удалена'], 200);
    } catch (\Throwable $th) {
      return $th;
    }
  }

  public function multidelete(Request $request)
  {
    try {
      foreach ((array) request('ids') as $id) {
        $group = TagsGroup::find($id);

        foreach ($group->tags as $tag) {
          $tag = Tag::find($tag->id);
          $tag->group_id = NULL;
          $tag->update();
        }
        $group->delete();

      }
      return response(['message' => 'Группы успешно удалены'], 200);
    } catch (\Throwable $th) {
      return $th;
    }
  }
}
