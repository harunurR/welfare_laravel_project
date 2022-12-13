<?php

namespace App\Http\Controllers;

use App\Models\SubHead;
use App\Models\MasterAccount;
use App\Models\ChildOne;
use App\Models\ChildTwo;
use Illuminate\Http\Request;

class ChildTwoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $childTwo= ChildTwo::latest()->paginate(10);
        return view('childTwo.index', compact('childTwo'));
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
        $childOne=ChildOne::all();
        return view('childTwo.create', compact('master','subhead','childOne',));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cat = new childTwo;
        $cat->child_one_id = $request->child_one_id;
        $cat->head_name = $request->head_name;
        $cat->head_code = $request->head_code;
        $cat->opening_balance = $request->opening_balance;
        $cat->save();
        return redirect()->route('childTwo.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ChildTwo  $childTwo
     * @return \Illuminate\Http\Response
     */
    public function show(ChildTwo $childTwo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ChildTwo  $childTwo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $master=MasterAccount::all();
        $subhead=SubHead::all();
        $childOne=ChildOne::all();
        $childTwo = childTwo::findOrFail($id);
        return view('childTwo.edit',compact('childTwo','master','subhead','childOne'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ChildTwo  $childTwo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $childTwo=childTwo::findOrFail($id);
        $childTwo->child_one_id = $request->child_one_id;
        $childTwo->head_name = $request->head_name;
        $childTwo->head_code = $request->head_code;
        $childTwo->opening_balance = $request->opening_balance;
        $childTwo->save();
        return redirect()->route('childTwo.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ChildTwo  $childTwo
     * @return \Illuminate\Http\Response
     */
    public function destroy(ChildTwo $childTwo)
    {
        $childTwo->delete();
        return redirect()->back();
    }
}
