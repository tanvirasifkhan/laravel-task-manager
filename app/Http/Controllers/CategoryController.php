<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categories;
use Validator;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_categories=Categories::all();
        return view('categories',['categories'=>$all_categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('add_category');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validators=Validator::make($request->all(),[
            'category_title'=>'required|unique:categories',
        ]);
        if($validators->fails()){
            return redirect()->route('category.create')->withErrors($validators)->withInput();
        }else{
            $category=new Categories();
            $category->category_title=$request->category_title;
            $category->save();
            return redirect()->route('category.index')->with('message','Category created successfully !');
        }
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
    public function edit($id)
    {
        $category=Categories::where('id',$id)->get();
        return view('edit_category',['category'=>$category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validators=Validator::make($request->all(),[
            'category_title'=>['required',Rule::unique('categories')->ignore($id)]
        ]);
        if($validators->fails()){
            return redirect()->route('category.edit',$id)->withErrors($validators)->withInput();
        }else{
            $category=Categories::find($id);
            $category->category_title=$request->category_title;
            $category->save();
            return redirect()->route('category.index')->with('message','Category updated successfully !');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $find_category=Categories::find($id);
        $find_category->delete();
        return redirect()->route('category.index')->with('message','Category removed successfully !');
    }
}
