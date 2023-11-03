<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Post;
use App\Models\Quote;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use stdClass;

class FavoriteController extends Controller
{
  public function index()
  {
    $data = new stdClass();
    $data->posts = Post::get();
    $data->favorites = Favorite::where('user_id', session('user')->id)->defaultOrder()->get()->toTree();
    $data->user = User::with('quotes')->find(session('user')->id);

    return view('pages.users.favorites', compact('data'));
  }

  public function show($favoriteId)
  {
    $data = new stdClass();
    $data->posts = Post::get();
    $data->user = User::first();

    if ($favoriteId == 'all') {
      $data->favorite = null;
      $data->quotes = $data->user->quotes()->paginate(10);
    } else {
      $data->favorite = Favorite::find($favoriteId);
      $ids = [$data->favorite->id];
      foreach ($data->favorite->children as $children) {
        array_push($ids, $children->id);
      }
      $data->quotes = Quote::whereHas('favorites', function ($q) use ($ids) {
        $q->whereIn('id', $ids);
      })->paginate(10);

      // $items = DB::table('quote_user')->whereIn('favorite_id', $ids)->paginate(10);
    }

    foreach ($data->quotes as $key => $quote) {
      $data->quotes[$key]->favorite = DB::table('quote_user')
        ->where('quote_id', $quote->id)
        ->where('user_id', session('user')->id)
        ->first();
    }

    return view('pages.users.favorites-show', compact('data'));
  }

  public function add()
  {
    $user = User::find(session('user')->id);

    if (request('favoriteId') != 'undefined') {
      $user->quotes()->syncWithoutDetaching([request('quoteId') => ['favorite_id' => request('favoriteId') ]]);
    } else {
      $user->quotes()->syncWithoutDetaching(request('quoteId'));
    }

    return;
  }

  public function remove($quoteId)
  {
    $user = User::find(session('user')->id);
    $user->quotes()->detach($quoteId);

    return;
  }

  public function create()
  {
    $favorite = Favorite::create([
      'title' => request('title'),
      'user_id' => session('user')->id,
    ]);

    if (request('parent_id')) {
      $parent = Favorite::find(request('parent_id'));
      $parent->appendNode($favorite);
    } else {
      $result = Favorite::where('user_id', session('user')->id)->defaultOrder()->get();
      $favorite->insertBeforeNode($result[0]);
    }


    return $favorite;
  }

  public function update()
  {
    $favorite = Favorite::find(request('id'));
    $favorite->title = request('title');
    $favorite->update();

    return $favorite;
  }

  public function delete($favoriteId)
  {
    Favorite::find($favoriteId)->delete();
    return;
  }
}
