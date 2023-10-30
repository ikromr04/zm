<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
  public function login()
  {
    return view('auth.login');
  }

  public function check(Request $request)
  {
    if (!$request->login) {
      return response(['email' => 'Это поле обязательное'], 400);
    }
    if (!$request->password) {
      return response(['password' => 'Это поле обязательное'], 400);
    }

    $user = User::where('email', '=', $request->login)->first();

    if (!$user) {
      return response(['email' => 'Пользователь не найден'], 400);
    }

    if (Hash::check($request->password, $user->password)) {
      session()->put('user', $user);

      return $user;
    } else {
      return response(['password' => 'Неправильный пароль'], 400);
    }
  }

  public function logout()
  {
    if (session()->has('user')) {
      session()->pull('user');
    }

    return redirect()->back();
  }
}
