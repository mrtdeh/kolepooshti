<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    

    public function save(Request $req)
    {
        User::create([

            "type" => $req->type,
            "fname" => $req->fname,
            "lname" => $req->lname,
            "mobile" => $req->mobile,
            "codemeli" => $req->codemeli,
            "password" => bcrypt($req->password),
            
        ]);

        return redirect()->back();
    }
}
