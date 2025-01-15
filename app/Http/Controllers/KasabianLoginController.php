<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

        if($validator->fails()){
            return response('fails');
        }

        if(Auth::attempt(['kasabianUsername' => $request->kasabianUser, 'password' => $request->kasabianPass])){
            return response('success');
        }else{
            return response('fail');
        }

    }
}
