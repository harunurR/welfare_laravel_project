<?php

namespace App\Http\Controllers;

use App\Models\FeeCategory;
use Illuminate\Http\Request;

class FeeCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feeCategory= feeCategory::paginate(10);
        return view('feeCategory.index',compact('feeCategory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('feeCategory.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cat = new feeCategory;
            $cat->name = $request->name;
            $cat->save();
           return redirect()->route('feeCategory.index'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FeeCategory  $feeCategory
     * @return \Illuminate\Http\Response
     */
    public function show(FeeCategory $feeCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FeeCategory  $feeCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $feeCategory = feeCategory::findOrFail($id);
        return view('feeCategory.edit',compact('feeCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FeeCategory  $feeCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $feeCategory=feeCategory::findOrFail($id);
        $feeCategory->name = $request->name;
        $feeCategory->save();
        return redirect()->route('feeCategory.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FeeCategory  $feeCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(FeeCategory $feeCategory)
    {
        $feeCategory->delete();
        return redirect()->back();
    }
}
