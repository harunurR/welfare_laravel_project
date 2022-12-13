<?php

namespace App\Http\Controllers;

use App\Models\Regulation;
use Illuminate\Http\Request;

class RegulationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $regulation= Regulation::paginate(10);
        return view('regulation.index', compact('regulation'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('regulation.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cat = new Regulation;
        $cat->date =$request->date;
        $cat->name =$request->name;
        if($request->has('image')){
            $imageName= rand(111,999).time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/regulation'), $imageName);
            $cat->image=$imageName;
        }
        $cat->remark = $request->remark;
        $cat->save();
        
        return redirect()->route('regulation.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Regulation  $regulation
     * @return \Illuminate\Http\Response
     */
    public function show(Regulation $regulation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Regulation  $regulation
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $regulation= Regulation::findOrFail($id);
        return view('regulation.edit',compact('regulation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Regulation  $regulation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $regulation=Regulation::find($id);
        $regulation->date = $request->date;
        $regulation->name = $request->name;
        if($request->has('image')){
            $imageName= rand(111,999).time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/regulation'), $imageName);
            $regulation->image=$imageName;
        }
        $regulation->remark = $request->remark;
        $regulation->save();
        return redirect()->route('regulation.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Regulation  $regulation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Regulation $regulation)
    {
        //
    }
}
