<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
  
    public function __construct()
    {
        $this->middleware('auth:sanctum')->except('index');
    }

   
    public function index()
    {
        return view('admin.admin');
    }
}