<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KasabianHomeController extends Controller
{
    public function index()
    {
        $kasabianUser = Auth::user();

        if($kasabianUser->kasabianRoleId == 1){
            return redirect()->route('book');
        }elseif($kasabianUser->kasabianRoleId == 2){
            return $kasabianUser;
        }elseif($kasabianUser->kasabianRoleId == 3){
            return redirect()->route('peminjamHome');
        }else{
            return redirect()->back();
        }
    }
}
