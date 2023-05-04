<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class PasswordController extends Controller
{
    public function ChangePassword(){
        return view('admin.body.change');
    }
    public function UpdatePassword(Request $request){
        $validateData = $request->validate([
            //validates passord fields 
          
            'password' => 'required|confirmed',


        ]);
//confirms whether the old password matches the one in the database
        $hashedPassword = Auth::user() ->password;
        if(Hash::check($request->oldpassword,$hashedPassword )){
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user-> save();
            Auth::logout();

            return redirect() ->route('login')-> with('success', 'Your password has been changed please login with the current password');
        }else {
            return redirect() ->back() ->with('error', 'password does not match');
        }


    }
    // accessing the authenticated current user
     public function profilePassword(){
        if (Auth::user()){
            $user = User::find(Auth::user() -> id);
            if($user){
                return view('admin.body.profile', compact('user'));
            }
        }
}

public function UpdateUser(Request $request){
    $user = User::find(Auth::user() ->id);
    if($user){
        $user ->name = $request['name'];
        $user ->email = $request['email'];

        $user ->save();

        return redirect() ->back() ->with('success', 'user info updated');
    }else {
        return redirect() ->back();
}

}
}