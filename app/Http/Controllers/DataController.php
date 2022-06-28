<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataController extends Controller
{
    public function check_file(){

    }

    public static function extractZip($request){
        $fileName = time().'.'.$request->gamefile->extension();
        $request->gamefile->move(public_path('storage/tmp'), $fileName);
        $path = public_path('storage/games/'. $request->short_name);
        
        $zip = new \ZipArchive();
        $status = $zip->open(public_path('storage/tmp/'. $fileName));
        if ($status !== true) {
            throw new \Exception($status);
        }
        else{
            
            if (!\File::exists($path)) {
                \File::makeDirectory($path, 0755, true);
            }
            $zip->extractTo($path);
            $zip->close();
            unlink(public_path('storage/tmp/'. $fileName));
            
            $with_dir = pathinfo($request->gamefile->getClientOriginalName(), PATHINFO_FILENAME);

            if( file_exists($path . '/' . $with_dir . '/index.html') ){
                return '/storage/games/'. $request->short_name . '/'. $with_dir . '/index.html';
                
            }elseif( file_exists($path . '/index.html') ){
                return '/storage/games/'. $request->short_name . '/index.html';

            }

        }
    }

}
