<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Controllers\acceuilAdminView;

class acceuilAdminController extends Controller
{
    public function index()
    {        
        (new acceuilAdminView)->acceuilAdmin();

        return view('acceuilAdmin');
    }
}
