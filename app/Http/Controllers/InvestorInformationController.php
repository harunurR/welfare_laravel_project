<?php

namespace App\Http\Controllers;

use App\Models\InvestorInformation;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\Investor\AddNewRequest;
use App\Http\Requests\Investor\UpdateRequest;

class InvestorInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $investor_information= InvestorInformation::paginate(10);
        return view('investor.index',compact('investor_information'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('investor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddNewRequest $request)
    {
        $user=new User;
        $user->name=$request->name;
        $user->email=$request->email;
        $user->phone=$request->contact_no;
        $user->role_id=4;
        $user->password=sha1(123456);
        if($user->save()){
            $cat = new InvestorInformation;
            $cat->investor_id = $request->investor_id;
            if($request->has('image')){
                $imageName= rand(111,999).time().'.'.$request->image->extension();
                $request->image->move(public_path('uploads/investor'), $imageName);
                $cat->image=$imageName;
            }
            $cat->name = $request->name;
            $cat->father_name = $request->father_name;
            $cat->contact_no = $request->contact_no;
            $cat->email = $request->email;
            $cat->national_id = $request->national_id;
            $cat->address = $request->address;
            $cat->number_shares = $request->number_shares;
            $cat->nominee_name = $request->nominee_name;
            $cat->relationship = $request->relationship;
            $cat->joining_date = $request->joining_date;
            $cat->user_id = $user->id;
            $cat->save();
        }
        
        return redirect()->route('investor.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InvestorInformation  $investorInformation
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $investor_information = InvestorInformation::findOrFail($id);
        return view('investor.view',compact('investor_information'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InvestorInformation  $investorInformation
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $investor = InvestorInformation::findOrFail($id);
        return view('investor.edit',compact('investor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\InvestorInformation  $investorInformation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $investorInformation=InvestorInformation::find($id);
        $investorInformation->investor_id = $request->investor_id;
        if($request->has('image')){
            $imageName= rand(111,999).time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/investor'), $imageName);
            $investorInformation->image=$imageName;
        }
        $investorInformation->name = $request->name;
        $investorInformation->father_name = $request->father_name;
        $investorInformation->contact_no = $request->contact_no;
        $investorInformation->email = $request->email;
        $investorInformation->national_id = $request->national_id;
        $investorInformation->address = $request->address;
        $investorInformation->number_shares = $request->number_shares;
        $investorInformation->nominee_name = $request->nominee_name;
        $investorInformation->relationship = $request->relationship;
        $investorInformation->joining_date = $request->joining_date;
        // $investorInformation->user_id = $request->user_id;
        $investorInformation->save();
        return redirect()->route('investor.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InvestorInformation  $investorInformation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        InvestorInformation::find($id)->delete();
        // print_r($id);
        return redirect()->back();
    }
}
