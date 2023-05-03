<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PasswordController extends Controller
{
    public function ChangePassword(){
        return view('admin.body.change');
    }
}
