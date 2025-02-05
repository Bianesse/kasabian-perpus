<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class KasabianLoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'kasabianUser' => 'required',
            'kasabianPass' => 'required',
        ]);

        if ($validator->fails()) {
            return response('fails');
        }

        if (Auth::attempt(['kasabianUsername' => $request->kasabianUser, 'password' => $request->kasabianPass])) {
            return redirect()->route('main');
        } else {
            return back()->withErrors([
                'message' => 'Credential Unkown',
            ]);
        }
    }

    public function registerProcess(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'password2' => 'required|min:6',
            'full_name' => 'required|string',
            'address' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($request->password != $request->password2) {
            return redirect()->back()->withErrors([
                'message' => 'Password Tidak Sama',
            ]);
        }

        User::create([
            'kasabianUsername' => $request->username,
            'kasabianEmail' => $request->email,
            'password' => Hash::make($request->password),
            'kasabianNamaLengkap' => $request->full_name,
            'kasabianRoleId' => 3,
            'kasabianAlamat' => $request->address,
        ]);

        return redirect()->route('loginPage')->with('success', 'Akun berhasil dibuat, silakan login.');
    }


    public function register()
    {
        return view('login.kasabianRegister');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('loginPage');
    }
}
