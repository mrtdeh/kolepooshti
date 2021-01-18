<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    

    public function login()
    {
        $pageConfigs = ['bodyCustomClass' => 'login-bg', 'isCustomizer' => false];
  
        return view('/auth/login', [
            'pageConfigs' => $pageConfigs
        ]);
    }
}
