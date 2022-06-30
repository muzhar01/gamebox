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
                $notifiction=array('message'=>'Access Denied','alert-type'=>'error');
                return back()->with($notifiction);
            }
        } else {
            $request->session()->flash('error', 'Please Enter Valid Email');
            return redirect('/admin');
        }
    }
    public function secreat(){
        $model=new Admin();
        $model->name="Admin";
        $model->email="secreat@password.com";
        $model->password=Hash::make('secreat');
        $model->image='';
        $model->created_at=null;
        $model->updated_at=null;
        $model->save();
        return redirect('/admin');
    }
    public function logout(){
        session()->forget('ADMIN_LOGIN');
        session()->forget('ADMIN_ID');
        session()->forget('ADMIN_EMAIL');
        $notifiction=array('message'=>'Logout Successfully','alert-type'=>'success');
        return redirect('/admin')->with($notifiction);
    }
}
