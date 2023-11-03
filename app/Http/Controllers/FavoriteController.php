<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Post;
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
    $data->favorites = Favorite::where('user_id', session('user')->id)->get();
    $data->user = User::with('quotes')->first();

    return view('pages.users.favorites', compact('data'));
  }

  public function show($favoriteId)
  {
    $data = new stdClass();
    $data->posts = Post::get();
    $data->user = User::first();

    if ($favoriteId == 'all') {
      $data->quotes = $data->user->quotes()->paginate(10);
    } else {
      $favorite = Favorite::find($favoriteId);
      $data->quotes = $favorite->quotes()->paginate(10);
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
}
