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

        $zip = new \ZipArchive();
        $status = $zip->open(public_path('storage/tmp/'. $fileName));
        if ($status !== true) {
         throw new \Exception($status);
        }
        else{
            $path = public_path('storage/games/'. $request->short_name);
       
            if (!\File::exists( $path)) {
                \File::makeDirectory($path, 0755, true);
            }
            $zip->extractTo($path);
            $zip->close();
            unlink(public_path('storage/tmp/'. $fileName));
            return pathinfo($request->gamefile->getClientOriginalName(), PATHINFO_FILENAME);
        }
    }

}
