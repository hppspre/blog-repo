<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;


use Auth;


class profile extends Controller
{
    function index()
    {
        return view('/userProfile');
    }
}
