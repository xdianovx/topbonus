<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CertificatesOrgs;
use App\Models\LicensesOrgs;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function index()
    {
       
        $user = Auth::user();
        return view('admin.admin',compact('user'));
    }
}
