<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function registerView(): View
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        if ($request->cpassword == $request->password) {
            $existingUser = User::where('username', $request->username)
                ->orWhere('email', $request->email)
                ->first();

            if ($existingUser) {
                return response()->json(['status' => 'error', 'message' => 'Username atau email sudah ada!']);
            } else {
                $user = new User;
                $fullname = $request->fullname;
                $fullname = ucwords(str_replace('-', ' ', $fullname));
                $user->fullname = $fullname;
                $user->username = $request->username;
                $user->email = $request->email;
                $user->password = Hash::make($request->password);
                $user->save();

                return response()->json(['status' => 'success']);
            }
        } else {
            return response()->json(['status' => 'error', 'message' => 'Password tidak sama!']);
        }
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials, true)) {
            $user = User::where('email', $credentials['email'])->first();
            $user_id = $user->id;
            $username = $user->username;
            session([
                'user_id' => $user_id,
            ]);
            return response()->json(['status' => 'success', 'username' => $username]);
        }
        return response()->json(['status' => 'error', 'message' => 'Email atau password salah!']);
    }

    public function logout()
    {
        Auth::logout();
        Session::flush();
        return redirect()->route('/');
    }
}
