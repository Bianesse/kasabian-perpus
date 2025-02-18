<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class kasabianUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::with('kasabianRoles')->get();
        return view('admin.users.kasabianUser', ['dataUser' => $user]);
    }


    public function tambahUsers(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kasabianUsername' => 'required',
            'kasabianEmail' => 'required',
            'kasabianPassword' => 'required',
            'kasabianRole' => 'required',
            'kasabianNamaLengkap' => 'required',
            'kasabianAlamat' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back();
        }

        $kasabianUser = User::create([
            'kasabianUsername' => $request->kasabianUsername,
            'kasabianEmail' => $request->kasabianEmail,
            'password' => Hash::make($request->kasabianPassword),
            'kasabianRoleId' => $request->kasabianRole,
            'kasabianNamaLengkap' => $request->kasabianNamaLengkap,
            'kasabianAlamat' => $request->kasabianAlamat,
        ]);

        return redirect()->route('users');
    }

    public function hapusUsers($id)
    {
        $user = User::destroy($id);
        return redirect()->route('users');
    }

    public function editUsers(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'kasabianUsername' => 'required',
            'kasabianEmail' => 'required',
            'kasabianRole' => 'required',
            'kasabianNamaLengkap' => 'required',
            'kasabianAlamat' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back();
        }

        $kasabianUser = User::find($id);

        $kasabianUser->update([
            'kasabianUsername' => $request->kasabianUsername,
            'kasabianEmail' => $request->kasabianEmail,
            'kasabianRoleId' => $request->kasabianRole,
            'kasabianNamaLengkap' => $request->kasabianNamaLengkap,
            'kasabianAlamat' => $request->kasabianAlamat,
        ]);

        return redirect()->route('users');
    }

}
