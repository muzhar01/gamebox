<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index(){
        return view('admin.login');
    }
    public function login(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);
        $email = $request->post('email');
        $password = $request->post('password');
        $result = Admin::where(['email' => $email])->first();
        if ($result) {
            if (Hash::check($password, $result->password)) {
                $request->session()->put('ADMIN_LOGIN', true);
                $request->session()->put('ADMIN_ID', $result->id);
                $request->session()->put('ADMIN_EMAIL',  $email);
                return redirect('admin/dashboard');
            } else {
                $request->session()->flash('error', 'Please Enter Valid Password');
                return redirect('/admin');
            }
        } else {
            $request->session()->flash('error', 'Please Enter Valid Email');
            return redirect('/admin');
        }
    }
}
