<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{


public function login(Request $request)
{
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        $user = Auth::user();

        // Điều hướng theo role
        if ($user->role_id == 1) {
            return redirect()->route('admin.home'); // route dành cho admin
        } else {
            return redirect()->route('products.index'); // route dành cho user
        }
    }

    return back()->withErrors([
        'email' => 'Email hoặc mật khẩu không đúng.',
    ]);
}

    public function showLogin()
    {
        return view('auth.login');
    }

    // public function login(Request $request)
    // {
    //     $credentials = $request->only('email', 'password');

    //     if (Auth::attempt($credentials)) {
    //         return redirect()->intended('/dashboard');
    //     }

    //     return back()->withErrors(['email' => 'Thông tin đăng nhập không đúng']);
    // }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed'
        ]);

        $user = User::create([
            'name' => $request->name,
            'role_id' => 2, // 2 = Khách hàng
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);


    return redirect()->route('login')->with('success', 'Đăng ký thành công! Vui lòng đăng nhập.');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
