<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories  = Category::paginate(10);
        return view('admin.category.index', ['categories'=> $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $inputs = $request->validate([
            'title' => 'required|string|max:254',
            'description' => 'required|string|max:254',
            'thumbnail' => 'required|image'
        ]);

        $imageName = time().'.'.$request->thumbnail->extension();  
        $request->thumbnail->move(public_path('storage/category'), $imageName);

        $category = new Category();
        $category->fill($inputs);
        $category->thumbnail = $imageName;
        $category->save();

        return redirect()->route('admin.category.index')->with('success', 'Category added Successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $inputs = $request->validate([
            'title' => 'required|string|max:254',
            'description' => 'required|string|max:254',
            'thumbnail' => 'required|image'
        ]);

        $old_image = public_path('storage/category/') . $category->thumbnail;

        if(file_exists($old_image)){
            unlink($old_image);
        }

        $imageName = time().'.'.$request->thumbnail->extension();  
        $request->thumbnail->move(public_path('storage/category'), $imageName);

        $category = new Category();
        $category->fill($inputs);
        $category->thumbnail = $imageName;
        $category->save();

        return redirect()->route('admin.category.index')->with('success', 'Category added Successfully.');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
