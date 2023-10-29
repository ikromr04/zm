<?php

namespace App\Http\Controllers;

use App\Models\GroupSort;
use App\Models\Post;
use App\Models\Quote;
use App\Models\Tag;
use App\Models\TagsGroup;
use Illuminate\Http\Request;
use stdClass;

class TagsController extends Controller
{
  public function index()
  {
    $data = new stdClass();
    $data->posts = Post::latest()->get();
    $data->tags = Tag::orderBy('title', 'asc')->get();

    return view('pages.tags.index', compact('data'));
  }

  public function selected($slug)
  {
    $data = new stdClass();
    $data->tags = Tag::orderBy('title', 'asc')->get();
    $data->selectedTag = Tag::where('slug', $slug)->first();
    $tagId = [$data->selectedTag->id];
    $data->quotes = Quote::whereHas('tags', function ($q) use ($tagId) {
      $q->whereIn('id', $tagId);
    })->paginate(10);

    $sortOrder = array_flip(json_decode($sort->sort));

    $data->groups = $groups->sortBy(function ($group) use ($sortOrder) {
      return $sortOrder[$group->id] ?? 999999;
    })->values();

    return view('pages.tags.selected', compact('data'));
  }

  public function get()
  {
    try {
      return Tag::defaultOrder()->get()->toTree();
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
      $tag = Tag::where('title', $request->title)->first();
      if ($tag) {
        return response(['message' => 'Тег уже существует'], 400);
      }
      $tag = Tag::create([
        'title' => $request->title,
        'group_id' => $request->group_id ?? NULL,
      ]);

      return response([
        'tag' => $tag,
        'message' => 'Тег успешно добавлен',
      ], 200);
    } catch (\Throwable $th) {
      return $th;
    }
  }

  public function update(Request $request, Tag $tag)
  {
    $tag = Tag::find(request('id'));
    $tag->title = request('title');
    $tag->group_id = request('group_id') ?? NULL;

    try {
      $tag->update();

      return response([
        'tag' => $tag,
        'message' => 'Тег успешно сохранен',
      ], 200);
    } catch (\Throwable $th) {
      return $th;
    }
  }

  public function destroy(Tag $tag)
  {
    try {
      $tag->quotes()->detach();
      $tag->delete();

      return response(['message' => 'Тег успешно удален'], 200);
    } catch (\Throwable $th) {
      return $th;
    }
  }

  public function hierarchy(Request $request)
  {
    try {
      Tag::rebuildTree($request->hierarchy, true);

      return response(['message' => 'Данные успешно сохранены'], 200);
    } catch (\Throwable $th) {
      return $th;
    }
  }
}
