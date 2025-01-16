<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Kasabian_role;
use Illuminate\Support\Facades\Validator;

class kasabianUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::with('kasabianRoles')->get();
        return view('admin.users.kasabianUser', ['userData' => $user]);
    }

    public function tambahUsersPage()
    {
        $user = User::with('kasabianRoles')->get();
        return view('admin.users.kasabianTambahUser', ['dataUser' => $user]);
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
            'password' => $request->kasabianPassword,
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

    public function editUsersPage($id)
    {
        $kasabianUser = User::find($id);
        return view('admin.kategori.kasabianEditKategoriPage', ['dataUser' => $kasabianUser]);
    }

    public function editKategori(Request $request, $id)
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

        $kasabianKategori = User::find($id);

        $kasabianKategori->update([
            'kasabianUsername' => $request->kasabianUsername,
            'kasabianEmail' => $request->kasabianEmail,
            'password' => $request->kasabianPassword,
            'kasabianRoleId' => $request->kasabianRole,
            'kasabianNamaLengkap' => $request->kasabianNamaLengkap,
            'kasabianAlamat' => $request->kasabianAlamat,
        ]);

        return redirect()->route('kategori');
    }

}
