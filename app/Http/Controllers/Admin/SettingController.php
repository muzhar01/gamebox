<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{
    public function index()
    {
        $logo = Setting::where('key', 'logo')->first();
        $backgroundImage = Setting::where('key', 'background_image')->first();
        return view('admin.settings', compact('logo', 'backgroundImage'));
    }

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
        
        $setting = Setting::where('key', 'logo')->first() ?? new Setting;
        
        if ($request->has('logo')) {
            $logoName = time().'.'.$request->logo->extension();
            $request->logo->move(public_path('storage/logo'), $logoName);
        }
        
        if (isset($logoName) && isset($setting->value)) {
            $old_log = public_path('storage/logo/'. $setting->value);
            if(file_exists($old_log)){
                \Storage::delete($old_log);
            }
        }
        
        $setting->key = 'logo';
        $setting->value = $logoName;

        $setting->save();

        return back()->with('success', 'Logo updated successfully!');
    }

    //Update front backgroundImage
    public function backgroundImage(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'background_image' => 'required',
        ]);

        if ($validator->fails()) {
            return back()
                    ->withErrors($validator, 'addBackgroundImage')
                    ->withInput();
        }

        $validated = $validator->validated();
        
        $setting = Setting::where('key', 'background_image')->first() ?? new Setting;
        
        if ($request->has('background_image')) {
            $imageName = time().'.'.$request->background_image->extension();
            $request->background_image->move(public_path('storage/background'), $imageName);
        }
        
        if (isset($imageName) && isset($setting->value)) {
            $old_log = public_path('storage/background/'. $setting->value);
            if(file_exists($old_log)){
                \Storage::delete($old_log);
            }
        }
        
        $setting->key = 'background_image';
        $setting->value = $imageName;

        $setting->save();

        return back()->with('success', 'Background Image updated successfully!');
    }


}
