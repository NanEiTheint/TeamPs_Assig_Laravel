<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=DB::table('categories')->where('status',1)->get();
        return view("backend/category/index",compact("categories"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("backend/category/create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "name"=>"required",
            "photo"=>"required",
            "icon"=>"required"
        ]);

        if($request->file())
        {
            $fileNamePhoto=time().'_'.$request->photo->getClientOriginalName();
            $filePathPhoto=$request->file('photo')->storeAs('CategoryImg',$fileNamePhoto,'public');
            $fullpathPhoto='/storage/'.$filePathPhoto;

            $fileNameIcon=time().'_'.$request->icon->getClientOriginalName();
            $filePathIcon=$request->file('icon')->storeAs('CategoryIcon',$fileNameIcon,'public');
            $fullpathIcon='/storage/'.$filePathIcon;

        }

        //dd($request);
        $category=new Category;

        $category->name=$request->name;
        $category->photo=$fullpathPhoto;
        $category->icon=$fullpathIcon;
        if($request->has('status'))
        {
            $category->status=1;
        }

        $category->save();

        return redirect()->route("categories.index");


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view("backend/category/edit",compact("category"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //dd($request);
        $request->validate([
            "name"=>"required"
        ]);

        $imagefile=$request->file("photo");

        if($imagefile==null)
        {
            $fullpathPhoto=$request->oldphoto;
        }
        else
        {
            $basepathPhoto="images/categoryimages/";
            $imgName=$imagefile->getClientOriginalName();
            $fullpathPhoto=$basepathPhoto.$imgName;
            $imagefile->move($basepathPhoto,$imgName);
        }

        $iconfile=$request->file("icon");
        
        if($iconfile==null)
        {
            $fullpathIcon=$request->oldicon;
        }
        else
        {
            $basepathIcon="images/categoryicons/";
            $iconName=$iconfile->getClientOriginalName();
            $fullpathIcon=$basepathIcon.$iconName;
            $iconfile->move($basepathIcon,$iconName);
        }

        $category->name=$request->name;
        $category->photo=$fullpathPhoto;
        $category->icon=$fullpathIcon;
        if($request->has('status'))
        {
            $category->status=1;
        }
        else
            $category->status=0;

        $category->save();

        return redirect()->route("categories.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //dd($category);
        $category->delete();
        return redirect()->route("categories.index");
    }
}
