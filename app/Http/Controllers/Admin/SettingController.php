<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{

    //Update front logo
    public function logo(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'logo' => 'required',
        ]);

        if ($validator->fails()) {
            return back()
                    ->withErrors($validator, 'addLogo')
                    ->withInput();
        }

        $validated = $validator->validated();
        
        $setting = Setting::first() ?? new Setting;
        
        if ($request->has('logo')) {
            $logoName = time().'.'.$request->logo->extension();
            $request->logo->move(public_path('storage/logo'), $logoName);
        }
        
        if (isset($logoName) && isset($setting->logo)) {
            $old_log = public_path('storage/logo/'. $setting->logo);
            if(file_exists($old_log)){
                \Storage::delete($old_log);
            }
        }
        
        $setting->logo = $logoName;

        $setting->save();

        return back()->with('success', 'Logo updated successfully!');
    }


}
