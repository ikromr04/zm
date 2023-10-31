<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserController extends Controller
{
  public function register()
  {
    if (!request('name')) {
      return response(['name' => 'Это поле обязательное'], 400);
    }
    if (!request('email')) {
      return response(['email' => 'Это поле обязательное'], 400);
    }
    if (!request('password')) {
      return response(['password' => 'Это поле обязательное'], 400);
    }
    if (!request('confirm_password')) {
      return response(['confirm_password' => 'Это поле обязательное'], 400);
    }

    if (request('password') != request('confirm_password')) {
      return response([
        'password' => 'Пароли не совпадают',
        'confirm_password' => 'Пароли не совпадаюте'
      ], 400);
    }

    $user = User::create([
      'name' => request('name'),
      'email' => request('email'),
      'password' => bcrypt(request('password')),
    ]);

    session()->put('user', $user);

    return $user;
  }

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

  public function forgotPassword(Request $request)
  {
    if (!request('email')) {
      return response(['email' => 'Это поле обязательное'], 400);
    }
    $user = User::where('email', request('email'))->first();

    if (!$user) {
      return response(['email' => 'Выбранный адрес электронной почты недействителен.'], 400);
    }

    $token = Str::random(64);

    DB::table('password_resets')->insert([
      'email' => request('email'),
      'token' => $token,
      'created_at' => Carbon::now()
    ]);

    Mail::send('emails.forgot', ['token' => $token], function ($message) use ($request) {
      $message->to($request->email);
      $message->subject('Сброс пароля');
    });

    return response(['message' => 'Мы отправили вам ссылку для сброса пароля по электронной почте!'], 200);
  }

  public function resetPassword($token)
  {
    return view('pages.reset-password', ['token' => $token]);
  }

  public function resetPasswordSubmit(Request $request)
  {
    if (!request('email')) {
      return response(['email' => 'Это поле обязательное'], 400);
    }
    if (!request('password')) {
      return response(['password' => 'Это поле обязательное'], 400);
    }
    if (!request('confirm_password')) {
      return response(['confirm_password' => 'Это поле обязательное'], 400);
    }
    if (request('password') != request('confirm_password')) {
      return response([
        'password' => 'Пароли не совпадают',
        'confirm_password' => 'Пароли не совпадаюте'
      ], 400);
    }

    $user = User::where('email', '=', $request->email)->first();

    if (!$user) {
      return response(['email' => 'Пользователь не найден'], 400);
    }

    $updatePassword = DB::table('password_resets')
      ->where([
        'email' => $request->email,
        'token' => $request->token
      ])
      ->first();

    if (!$updatePassword) {
      return response(['message' => 'Недействительный токен!'], 400);
    }

    User::where('email', $request->email)
      ->update(['password' => Hash::make($request->password)]);

    DB::table('password_resets')->where(['email' => $request->email])->delete();

    $user = User::where('email', $request->email)->first();

    session()->put('user', $user);

    return redirect(route('home'));
  }
}
