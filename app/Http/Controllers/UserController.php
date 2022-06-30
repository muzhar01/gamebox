<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $validation = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|phone|unique:users,email',
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
}
