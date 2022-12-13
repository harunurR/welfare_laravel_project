<?php

namespace App\Http\Controllers;

use App\Models\SubHead;
use App\Models\MasterAccount;
use Illuminate\Http\Request;

class SubHeadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subHead= SubHead::paginate(10);
        return view('subHead.index',compact('subHead'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $master=MasterAccount::all();
        return view('subHead.create',compact('master'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cat = new SubHead;
        $cat->master_head_id = $request->master_head_id;
        $cat->head_name = $request->head_name;
        $cat->head_code = $request->head_code;
        $cat->opening_balance = $request->opening_balance;
        $cat->save();
       return redirect()->route('subHead.index'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubHead  $subHead
     * @return \Illuminate\Http\Response
     */
    public function show(SubHead $subHead)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubHead  $subHead
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $master=MasterAccount::all();
        $subHead = subHead::findOrFail($id);
        return view('subHead.edit',compact('subHead','master'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubHead  $subHead
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $subHead=subHead::findOrFail($id);
        $subHead->master_head_id = $request->master_head_id;
        $subHead->head_name = $request->head_name;
        $subHead->head_code = $request->head_code;
        $subHead->opening_balance = $request->opening_balance;
        $subHead->save();
        return redirect()->route('subHead.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubHead  $subHead
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubHead $subHead)
    {
        $subHead->delete();
        return redirect()->back();
    }
}
