<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function admin(){
        return view('admin.dashboard');
    }

    public function achat(){
        return view('admin.achats');
    }

    public function validation_payement(){
        
    }
}
