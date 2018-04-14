<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\games;
use App\User;


class ProfileController extends Controller
{
    //

    public function edit($id)
    {
        //
        $user = Users::find($id);
        
        return view('inc.profile-edit');
    }
}
