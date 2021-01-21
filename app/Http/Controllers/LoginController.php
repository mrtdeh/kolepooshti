<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    

    public function login()
    {
        $pageConfigs = ['bodyCustomClass' => 'login-bg', 'isCustomizer' => false];
  
        return view('/auth/login', [
            'pageConfigs' => $pageConfigs
        ]);
    }


    public function showReset(Request $request)
    {
        $userId = session("user");

        if (empty($userId))
            return redirect("/");
        // dd(request());
        $user = User::find( $userId );
        
        // dd($user);
        $pageConfigs = ['bodyCustomClass' => 'login-bg', 'isCustomizer' => false];
  
        return view('/auth/reset',\compact("pageConfigs","user"));
    }



    public function reset(Request $req)
    {

        $user_id = $req->uid;

        $req = $this->validate( $req,[
            
            "password" => "required|min:6",
            "password_confirmation" => "required|same:password"
        ],[
            
        "password_confirmation.same" => "رمز وارد شده مطابقت ندارد",
        "password.min" => "باید حداقل ۶ کارکتر باشد",
        
        ]);
            
            
        
        $user = User::find( $user_id );
        

        if(empty($user)){
            return redirect("/");
        }

        $newpas = bcrypt($req["password"]);
        $user->password = $newpas;
        $user->save();

        

        return redirect("/")->with('message', "گذرواژه شما با موفقیت تغییر یافت");
    }
}
