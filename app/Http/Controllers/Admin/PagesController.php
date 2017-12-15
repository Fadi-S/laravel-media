<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{

    public function __construct()
    {
        $this->middleware("admin");
    }

    public function index()
    {
        return view("admin.index", ['title'=>"Stgtube | ".\Auth::guard("admin")->user()->display_name]);
    }
}
