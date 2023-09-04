<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Quote;
use stdClass;

class AppController extends Controller
{
  public function index()
  {
    $data = new stdClass();
    $data->quotes = Quote::latest()->paginate(10);
    $data->posts = Post::latest()->get();

    return view('pages.index', compact('data'));
  }
}
