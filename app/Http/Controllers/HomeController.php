<?php

namespace App\Http\Controllers;

use App\Http\Middleware\IsVerified;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware(IsVerified::class);
    // }

    public function home ()
    {



        return view("dashboard.index");
    }
}
