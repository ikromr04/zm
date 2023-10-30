<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
  public function updateAvatar($userId)
  {
    $user = User::find($userId);

    if ($user->avatar && file_exists(public_path($user->avatar))) {
      unlink(public_path($user->avatar));
    }

    $file = request()->file('avatar');
    $fileName = uniqid() . '.' . $file->extension();
    $file->move(public_path('images/users'), $fileName);

    $user->avatar = '/images/users/' . $fileName;
    $user->update();

    session()->put('user', $user);

    return $user->avatar;
  }
}
