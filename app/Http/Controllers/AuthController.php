<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function registerform(){
        return view('auth.register');
    }
    public function register(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required|string|min:4|confirmed',
            'role'=>'required|in:admin,user',
        ]);
        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'role'=>$request->role,
        ]);
        session([
            'user_id'=>$request->id,
            'user_name'=>$request->name,
            'user_role'=>$user->role,
        ]);
        Auth::login($user);
        return redirect()->back()->with('success','Successfully registered');
    }
    public function loginform(){
        return view('auth.login');
    }
    public function login(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|string|min:4'
        ]);
        if(Auth::attempt([
            'email'=>$request->email,
            'password'=>$request->password,
        ])){
            $user = Auth::user();

            session([
                'user_id'=>$request->id,
                'user_name'=>$request->name,
                'user_role'=>$user->role,
            ]);

            if($user->role == 'admin'){
                return redirect(route('admin.dashboard'));
            }
            return redirect(route('user.home'));
        }
        return redirect()->back()->with('error','Invalid email or password');
    }
    public function Adminlogout(){
        $user =Auth::user();
        Auth::logout();
        session()->flush();
        return redirect(route('loginform'))->with('success',$user->name.' logouted succesfully');
    }
    public function Userlogout(){
        $user =Auth::user();
        Auth::logout();
        session()->flush();
        return redirect(route('loginform'))->with('success',$user->name.' logouted succesfully');
    }
    public function userchangepassword(Request $request){
        $request->validate([
            'current_password'=>'required|min:4',
            'new_password'=>'required|min:4|confirmed'
        ]);
        $user = Auth::user();
        if(!Hash::check($request->current_password,
        $user->password)){
            return back()->with('error','current password incorrect');
        }
        $user->update([
            'password'=>Hash::make($request->new_password),
        ]);
        return redirect(route('user.home'))->with('success','password changed succesfully');

    }
    public function adminchangepassword(Request $request){
        $request->validate([
            'current_password'=>'required|min:4',
            'new_password'=>'required|min:4|confirmed'
        ]);
        $user = Auth::user();
        if(!Hash::check($request->current_password,
        $user->password)){
            return back()->with('error','current password incorrect');
        }
        $user->update([
            'password'=>Hash::make($request->new_password),
        ]);
        return redirect(route('user.home'))->with('success','password changed succesfully');
    }
    public function userchangedetails(Request $request){
        $request->validate([
            'new_name'=>'required',
            'new_email'=>'required|email',
        ]);
        $user = Auth::user();
        $user->update([
            'name'=>$request->new_name,
            'email'=>$request->new_email,
        ]);
        return redirect(route('user.home'))->with('success','Details changed succesfully');
    }
    public function adminchangedetails(Request $request){
        $request->validate([
            'new_name'=>'required',
            'new_email'=>'required|email',
        ]);
        $user = Auth::user();
        $user->update([
            'name'=>$request->new_name,
            'email'=>$request->new_email,
        ]);
        return redirect(route('user.home'))->with('success','Details changed succesfully');
    }


}
