<?php

namespace App\Http\Controllers;

use App\Models\Kasabian_role;
use App\Models\User;
use Illuminate\Http\Request;

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

}
