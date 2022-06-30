<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $validation =\Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|unique:users,phone',
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
        ]);
        if($validation->fails()) {
            return Response::json(array(
                'success' => false,
                'errors' => $validation->getMessageBag()->toArray()

            ), 400); // 400 being the HTTP code for an invalid request.
        }else{
            $model=new User();
            $model->name=$request->input('name');
            $model->email=$request->input('email');
            $model->phone=$request->input('phone');
            $model->password=Hash::make($request->input('password'));
            if($model->save()){
                return response()->json('Registered Successfully');
            }else{
                return response()->json('Failed to Register');
            }

        }
    }
    public function login(Request $request){
        $request->validate([
            'phone'=>'required',
            'password'=>'required'
        ]);
        $phone = $request->post('phone');
        $password = $request->post('password');
        $result = User::where(['phone' => $phone])->first();
        if ($result) {
            if (Hash::check($password, $result->password)) {
                $request->session()->put('USER_LOGIN', true);
                $request->session()->put('USER_ID', $result->id);
                $request->session()->put('USER_EMAIL',  $phone);
                return redirect('/');
            } else {
                $request->session()->flash('error', 'Please Enter Valid Password');
                $notifiction=array('message'=>'Access Denied','alert-type'=>'error');
                return back()->with($notifiction);
            }
        } else {
            $request->session()->flash('error', 'Please Enter Valid Number');
            return redirect('/');
        }
    }
}
