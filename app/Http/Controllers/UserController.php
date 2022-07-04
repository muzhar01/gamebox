<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|unique:users,phone',
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
        ]);
            $model=new User();
            $model->name=$request->input('name');
            $model->email=$request->input('email');
            $model->phone=$request->input('phone');
            $model->password=Hash::make($request->input('password'));

            if($model->save()){
                \Auth::login($model);
                return response()->json('Registered Successfully');
            }else{
                return response()->json('Failed to Register');
            }
    }
    public function login(Request $request){
        $credentials = $request->validate([
            'phone'=>'required',
            'password'=>'required'
        ]);

        if(\Auth::attempt($credentials) && \Auth::check()){
            
            return response()->json('Login Success');
        }else{
            
            return response()->json(['errors' => ['login_error' => 'Login Failed']], 422);
        }

        // $phone = $request->post('phone');
        // $password = $request->post('password');
        // $result = User::where(['phone' => $phone])->first();
        // if ($result) {
        //     if (Hash::check($password, $result->password)) {
        //         $request->session()->put('USER_LOGIN', true);
        //         $request->session()->put('USER_ID', $result->id);
        //         $request->session()->put('USER_PHONE',  $phone);
        //         return response()->json('Login Success');
        //     } else {
        //         $request->session()->flash('error', 'Please Enter Valid Password');
        //         $notifiction=array('message'=>'Access Denied','alert-type'=>'error');
        //         return back()->with($notifiction);
        //     }
        // } else {
        //     $request->session()->flash('error', 'Please Enter Valid Number');
        //     return redirect('/');
        // }
    }
    public function logout(){
        \Auth::logout();
        // session()->forget('USER_LOGIN');
        // session()->forget('USER_ID');
        // session()->forget('USER_PHONE');
        $notifiction=array('message'=>'Logout Successfully','alert-type'=>'success');
        return redirect('/')->with($notifiction);
    }
}
