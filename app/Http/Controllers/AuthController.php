<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $cred = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (Auth::attempt($cred)) {
            $request->session()->regenerate();

            return redirect()->intended('lk');
        }

        return back()->withErrors([
            'auth' => 'Неверный логин или пароль.',
        ]);
    }

    public function logout(){
        Auth::logout();
        return redirect('/lk/login?logout=1');
    }

    public static function register($email, $name){

        $isNew = false;
        $password = Str::random(8);

        $user = User::where('email', $email)->first();

        if (!$user){
            $isNew = true;

            $user = User::create([
                'name' => $name,
                'email' => $email,
                'password' => Hash::make($password)
            ]);
        }

        return [
            'email' => $email,
            'password' => $password,
            'id' => $user->id,
            'is_new' => $isNew
        ];

    }

    public function changePassword(Request $request){
        $cred = $request->validate([
            'old_password' => ['required', 'current_password'],
            'password' => ['required', 'confirmed']
        ],
        $messages = [
            'required' => ':attribute обязателен для заполнения.',
            'current_password' => 'Неверный пароль.',
            'confirmed' => 'Пароли не совпадают.'
        ],
        [
            'old_password' => 'Старый пароль',
            'password' => 'Новый пароль',
            'password2' => 'Повтор нового пароля'
        ]);

        $user =User::findOrFail(auth()->user()->id);

        $user->password = Hash::make($cred['password']);

        $user->save();

        return back()->with('success', true);
    }
}
