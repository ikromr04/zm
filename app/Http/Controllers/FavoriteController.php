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
    $data->favorites = Favorite::where('user_id', session('user')->id)
      ->defaultOrder()->get()->toTree();
    $data->user = User::with('quotes')->find(session('user')->id);

    return view('pages.users.favorites', compact('data'));
  }

  public function show($favoriteId)
  {
    $data = new stdClass();
    $data->posts = Post::get();
    $data->user = User::find(session('user')->id);

    if ($favoriteId == 'all') {
      $data->favorite = null;
      $data->quotes = $data->user->quotes;
      function unique_multidimensional_array($array, $key) {
        $temp_array = array();
        $i = 0;
        $key_array = array();

        foreach($array as $val) {
            if (!in_array($val[$key], $key_array)) {
                $key_array[$i] = $val[$key];
                $temp_array[$i] = $val;
            }
            $i++;
        }
        return $temp_array;
    }
      $data->quotes = unique_multidimensional_array($data->quotes, 'id');
    } else {
      $data->favorite = Favorite::find($favoriteId);
      $ids = [$data->favorite->id];
      foreach ($data->favorite->children as $children) {
        array_push($ids, $children->id);
      }
      $data->quotes = Quote::whereHas('favorites', function ($q) use ($ids) {
        $q->whereIn('id', $ids);
      })->paginate(10);
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
    $quote = Quote::find(request('quote_id'));

    $ids = [];

    if (count(request('ids')) == 0) {
      $user->quotes()->detach(request('quote_id'));
    } else {
      foreach (request('ids') as $id) {
        if ($id) {
          $ids[$id] = ['user_id' => $user->id];
        } else {
          $user->quotes()->syncWithoutDetaching(request('quote_id'));
        }
      }
    }

    $quote->favorites()->sync($ids);

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

  public function modal()
  {
    $favorites = User::find(session('user')->id)->favorites;
    $quote = Quote::find(request('quote_id'));

    return view('components.favorites-modal', compact('favorites', 'quote'));
  }
}
