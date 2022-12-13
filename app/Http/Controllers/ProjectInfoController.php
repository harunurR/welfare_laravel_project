<?php

namespace App\Http\Controllers;

use App\Models\ProjectInfo;
use App\Models\ClientInfo;
use App\Models\ClientPayment;
use Illuminate\Http\Request;

class ProjectInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projectInfos = ProjectInfo::paginate(10);
        return view('projectInfo.index', compact('projectInfos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientInfo= ClientInfo::all();
        return view('projectInfo.create', compact('clientInfo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cat = new ProjectInfo;
        $cat->client_id = $request->client_id;
        $cat->project_name = $request->project_name;
        $cat->description = $request->description;
        $cat->amount = $request->amount;
        $cat->duration = $request->duration;
        $cat->starting_date = $request->starting_date;
        $cat->end_date = $request->end_date;
        $cat->profit_projections = $request->profit_projections;
        $cat->return_date = $request->return_date;
        $cat->return_profit = $request->return_profit;
        $cat->save();

        return redirect()->route('projectInfo.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProjectInfo  $projectInfo
     * @return \Illuminate\Http\Response
     */
    public function show(ClientPayment $projectInfo)
    {
        // $projectInfo = ClientPayment::findOrFail($id);
        return view('projectInfo.view',compact('projectInfo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProjectInfo  $projectInfo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $projectInfo= ProjectInfo::findOrFail($id);
        $clientInfo= ClientInfo::all();
        return view('projectInfo.edit',compact('projectInfo','clientInfo'));
    }

 
      
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProjectInfo  $projectInfo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $projectInfo=ProjectInfo::find($id);
        $projectInfo->client_id = $request->client_id;
        $projectInfo->project_name = $request->project_name;
        $projectInfo->description = $request->description;
        $projectInfo->amount = $request->amount;
        $projectInfo->duration = $request->duration;
        $projectInfo->starting_date = $request->starting_date;
        $projectInfo->end_date = $request->end_date;
        $projectInfo->profit_projections = $request->profit_projections;
        $projectInfo->return_date = $request->return_date;
        $projectInfo->return_profit = $request->return_profit;
        $projectInfo->save();
        return redirect()->route('projectInfo.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProjectInfo  $projectInfo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ProjectInfo::find($id)->delete();
        return redirect()->back();
    }
}
