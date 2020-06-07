<?php

namespace App\Http\Controllers;

use App\AdminCategory;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = AdminCategory::all();
        return view('admin.category.category',[
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.add-category');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        AdminCategory::create($request->all());
        return redirect('/admin-category')->with('message','category added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AdminCategory  $adminCategory
     * @return \Illuminate\Http\Response
     */
    public function show(AdminCategory $adminCategory)
    {
       //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AdminCategory  $adminCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $adminCategory =  AdminCategory::find($id);

       return view('admin.category.edit-category',[
          'adminCategory' => $adminCategory
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AdminCategory  $adminCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $adminCategory =  AdminCategory::find($id);
        $adminCategory->cat_name = $request->cat_name;
        $adminCategory->cat_desc = $request->cat_desc;
        $adminCategory->save();
        return redirect('/admin-category')->with('message','category updated successfully');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AdminCategory  $adminCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)

    {
        $adminCategory =  AdminCategory::find($id);

       $adminCategory->delete();
       return back()->with('message','data deleted successfully');


    }
}
