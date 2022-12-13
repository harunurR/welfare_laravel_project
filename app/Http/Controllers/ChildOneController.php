<?php

namespace App\Http\Controllers;

use App\Models\SubHead;
use App\Models\MasterAccount;
use App\Models\ChildOne;
use Illuminate\Http\Request;

class ChildOneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $childOne= ChildOne::paginate(10);
        return view('childOne.index', compact('childOne'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $master=MasterAccount::all();
        $subhead=SubHead::all();
        return view('childOne.create', compact('master','subhead'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cat = new childOne;
        $cat->sub_head_id = $request->sub_head_id;
        $cat->head_name = $request->head_name;
        $cat->head_code = $request->head_code;
        $cat->opening_balance = $request->opening_balance;
        $cat->save();
        return redirect()->route('childOne.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ChildOne  $childOne
     * @return \Illuminate\Http\Response
     */
    public function show(ChildOne $childOne)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ChildOne  $childOne
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $master=MasterAccount::all();
        $subhead=SubHead::all();
        $childOne = childOne::findOrFail($id);
        return view('childOne.edit',compact('childOne','master','subhead'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ChildOne  $childOne
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $childOne=childOne::findOrFail($id);
        $childOne->sub_head_id = $request->sub_head_id;
        $childOne->head_name = $request->head_name;
        $childOne->head_code = $request->head_code;
        $childOne->opening_balance = $request->opening_balance;
        $childOne->save();
        return redirect()->route('childOne.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ChildOne  $childOne
     * @return \Illuminate\Http\Response
     */
    public function destroy(ChildOne $childOne)
    {
        $childOne->delete();
        return redirect()->back();
    }
}
