<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'banner' => 'required',
        ]);

        if ($validator->fails()) {
            return back()
                    ->withErrors($validator, 'addSlider')
                    ->withInput();
        }

        $validated = $validator->validated();

        $bannerName = time().'.'.$validated['banner']->extension();
        $validated['banner']->move(public_path('storage/sliders'), $bannerName);
        
        $slider = new Slider();
        $slider->banner = $bannerName;
        if ($request->link)
            $slider->link = $request->link;
        if ($request->status && $request->status === 'on')
            $slider->status = 1;
        else
            $slider->status = 0;
        $slider->save();

        return back()->with('success', 'Slider added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        $validator = Validator::make($request->all(), []);

        if ($validator->fails()) {
            return back()
                    ->withErrors($validator, $request->validationMessageBag)
                    ->withInput();
        }

        $validated = $validator->validated();

        if ($request->has('banner')) {
            $bannerName = time().'.'.$request->banner->extension();
            $request->banner->move(public_path('storage/sliders'), $bannerName);
        }
        
        if (isset($bannerName)) {
            \Storage::delete(public_path('storage/sliders/'. $slider->banner));
            $slider->banner = $bannerName;
        }
        
        if ($request->link)
            $slider->link = $request->link;
        else
            $slider->link = null;
        if ($request->status && $request->status === 'on')
            $slider->status = 1;
        else
            $slider->status = 0;
        $slider->save();

        return back()->with('success', 'Slider updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        if($slider){

            \Storage::delete(public_path('storage/sliders/'. $slider->banner));

            $slider->delete();
            return back()->with('success', 'Slider deleted successfully.');
        }
        
        return back()->with('error', 'Error: Something wrong.');
    }
}
