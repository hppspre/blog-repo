<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\comments;

use Auth;

class comment extends Controller
{
    function addComment(Request $request)
    {

        $request->validate([
            'id'=>'required',
            'comment'=>'required'
        ]);

        comments::create([
            'user_id' =>Auth::user()->id,
            'postid'=>$request->id,
            'comment'=>$request->comment,
        ]);

        return redirect()->back();
    }
}
