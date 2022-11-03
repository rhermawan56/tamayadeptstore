<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\User;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login', [
            'title' => 'Login Tamaya'
        ]);
        return view('logintemplate/foot');
    }

    public function loginStore(Request $request)
    {
        // dd($request->all());
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $type = User::firstWhere('email', $credentials['email'])->type;
            $request->session()->regenerate();

            if ($type == 'member') {
                return redirect()->intended('/dashboard/member');
            }

            if ($type == 'superadmin') {
                return redirect()->intended('/dashboard/employee');
            }
        }
        return back()->with('error', 'Please login again!');
    }

    public function indexRegisterMember()
    {
        return view('register', [
            'title' => 'Buat Akun'
        ]);
    }

    public function registerMemberStore(Request $request)
    {
        $rule = [
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required|max:13',
            'email' => 'required|email:dns',
            'password' => 'required|min:8',
            'confirmpassword' => 'required'
        ];

        $validation = $request->validate($rule);

        $confirmPassword = $request->password == $request->confirmpassword;

        if ($confirmPassword) {
            $dataMember = [
                'name' => $validation['name'],
                'address' => $validation['address'],
                'phone' => $validation['phone'],
                'messages' => 'Harap lakukan pembayaran member di store kami untuk mendapatkan penawaran menarik!'
            ];

            Member::create($dataMember);

            $lastMemberId = Member::latest()->first('id');

            $dataUser = [
                'member_id' => $lastMemberId->id,
                'email' => $validation['email'],
                'password' => bcrypt($validation['password']),
                'type' => 'member'
            ];
            User::create($dataUser);
            return redirect('/login')->with('success', 'Akun berhasil dibuat, silahkan login!');
        } else {
            return back()->with('gagal', 'Pembuatan akun member gagal!');
        }
    }
}
