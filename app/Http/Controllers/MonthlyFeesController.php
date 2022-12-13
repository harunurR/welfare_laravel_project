<?php

namespace App\Http\Controllers;

use App\Models\FeeCategory;
use App\Models\MonthlyFees;
use Illuminate\Http\Request;

class MonthlyFeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $monthlyFees= MonthlyFees::all();
        return view('monthlyFees.index',compact('monthlyFees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $feeCategory=FeeCategory::all();
        return view('monthlyFees.create',compact('feeCategory'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cat = new MonthlyFees;
        $cat->category_id = $request->category_id;
        $cat->month = $request->month;
        $cat->amount = $request->amount;
        $cat->note = $request->note;
        $cat->save();
        return redirect()->route('monthlyFees.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MonthlyFees  $monthlyFees
     * @return \Illuminate\Http\Response
     */
    public function show(MonthlyFees $monthlyFees)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MonthlyFees  $monthlyFees
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $feeCategory=FeeCategory::all();
        $monthlyFee=MonthlyFees::findOrFail($id);
        return view('monthlyFees.edit',compact('monthlyFee','feeCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MonthlyFees  $monthlyFees
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $monthlyFees=monthlyFees::findOrFail($id);
        $monthlyFees->category_id =$request->category_id;
        $monthlyFees->month =$request->month;
        $monthlyFees->amount =$request->amount;
        $monthlyFees->note =$request->note;
        $monthlyFees->save();
        return redirect()->route('monthlyFees.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MonthlyFees  $monthlyFees
     * @return \Illuminate\Http\Response
     */
    public function destroy(MonthlyFees $monthlyFees)
    {
        $monthlyFees->delete();
        return redirect()-back();
    }
}
