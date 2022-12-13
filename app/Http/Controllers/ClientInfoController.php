<?php

namespace App\Http\Controllers;

use App\Models\ClientInfo;
use Illuminate\Http\Request;

class ClientInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientInfo= ClientInfo::paginate(10);
        return view('clientInfo.index', compact('clientInfo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clientInfo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cat = new ClientInfo;
        $cat->name =$request->name;
        if($request->has('image')){
            $imageName= rand(111,999).time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/clientInfo'), $imageName);
            $cat->image=$imageName;
        }
        $cat->father_name = $request->father_name;
        $cat->contact_no = $request->contact_no;
        $cat->email = $request->email;
        $cat->national_id = $request->national_id;
        $cat->address = $request->address;
        
        $cat->save();
        

        return redirect()->route('clientInfo.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ClientInfo  $clientInfo
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $clientInfo = ClientInfo::findOrFail($id);
        return view('clientInfo.view',compact('clientInfo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ClientInfo  $clientInfo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clientInfo= ClientInfo::findOrFail($id);
        return view('clientInfo.edit',compact('clientInfo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ClientInfo  $clientInfo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $clientInfo=clientInfo::find($id);
        $clientInfo->name = $request->name;
        if($request->has('image')){
            $imageName= rand(111,999).time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/clientInfo'), $imageName);
            $clientInfo->image=$imageName;
        }
        $clientInfo->father_name = $request->father_name;
        $clientInfo->contact_no = $request->contact_no;
        $clientInfo->email = $request->email;
        $clientInfo->national_id = $request->national_id;
        $clientInfo->address = $request->address;
        $clientInfo->save();
        return redirect()->route('clientInfo.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ClientInfo  $clientInfo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ClientInfo::find($id)->delete();
        return redirect()->back();
    }
}
