<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use Image;
use File;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('name')->paginate(10);
        return view('admin.categories.index')->with(compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, Category::$rules, Category::$messages);

        $category = Category::create($request->only('name','description'));

        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $path = public_path() . '/images/categories/';
            $fileName = uniqid() . $file->getClientOriginalName();
            $move = Image::make($file->getRealPath())->resize(350, 350)->save($path.$fileName);
            //$move = $file->move($path, $fileName);

            if($move)
            {
                $category->image = $fileName;
                $category->save();            
            }
        }
        return redirect('/admin/category');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit')->with(compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Category $category)
    {
        
        $this->validate($request, Category::$rules, Category::$messages);
        
        $category->update($request->only('name','description'));
        
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $path = public_path() . '/images/categories/';
            $fileName = uniqid() . $file->getClientOriginalName();
            $move = Image::make($file->getRealPath())->resize(350, 350)->save($path.$fileName);
            //$move = $file->move($path, $fileName);

            if($move)
            {
                $previosPath = $path . '/' . $category->image;
                
                
                $category->image = $fileName;
                $saved = $category->save();    

                if($saved){
                    File::delete($previosPath);        
                }

            }
        }
        return redirect('/admin/category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
    	$category->delete();

        return redirect()->back();
    }
}
