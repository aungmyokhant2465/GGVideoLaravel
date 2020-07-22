<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function getLogin() {
        return view('View.Login');
    }
    public function postLogin(Request $request){
        if(Auth::attempt(['email'=>$request['email'],'password'=>$request['pass']],$request['remember'])){
            return redirect()->route('welcome');
        }
        else{
            return redirect()->back()->with('info',"Authentication Error");
        }
    }
    public function getLogout(){
        Auth::logout();
        return redirect()->route('get.login');
    }
    public function getDashboard() {
        return view('welcome');
    }
    public function getRegister() {
        //dd('ok');
        return view('View.Register');
    }
    public function postRegister(Request $request) {
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required|unique:users',
            'password'=>'required|min:3',
            'coPassword'=>'same:password'
        ]);
        $user = new User();
        $user->name = $request['name'];
        $user->email = $request['email'];
        $password = bcrypt($request['password']);
        $user->password = $password;
        $user->save();
        return redirect()->back()->with('info',"The new user have been saved.");
    }
    public function getUsers() {
        $user = User::get();
        return view('View.Users')->with(['users'=>$user]);
    }
    public function getRemove($user_id) {
        $user = User::whereId($user_id)->firstOrFail();
        $user->delete();
        return redirect()->back()->with('info',"The ".$user->name." have been removed.");
    }
    public function postEdit(Request $request) {
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required',
            'password'=>'required|min:3',
            'coPassword'=>'same:password'
        ]);
        $user = User::whereId($request['id'])->first();
        $user->name = $request['name'];
        $user->email = $request['email'];
        $password = bcrypt($request['password']);
        $user->password = $password;
        $user->update();
        return redirect()->route('get.users')->with('info',"The ".$user->name."'s account have been updated.");
    }
    public function getEdit($user_id) {
        $user = User::whereId($user_id)->first();
        return view('View.EditUser')->with(['user'=>$user]);
    }
}
