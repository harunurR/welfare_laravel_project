<?php

namespace App\Http\Controllers;

use App\Models\ClientInfo;
use App\Models\ProjectInfo;
use App\Models\ClientPayment;
use App\Models\ChildOne;
use App\Models\ChildTwo;
use Exception;
use Illuminate\Http\Request;

class ClientPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientPayment= ClientPayment::paginate(10);
        return view('clientPayment.index',compact('clientPayment'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $paymethod=array();
        $account_data=ChildOne::whereIn('head_code',[11001,11002])->get();
        if($account_data){
            foreach($account_data as $ad){
                $shead=ChildTwo::where('child_one_id',$ad->id)->get();
                if($shead){
                    foreach($shead as $sh){
                        $paymethod[]=array(
                                        'id'=>$sh->id,
                                        'head_code'=>$sh->head_code,
                                        'head_name'=>$sh->head_name,
                                        'table_name'=>'child_twos',
                                    );
                    }
                }else{
                    $paymethod[]=array(
                        'id'=>$ad->id,
                        'head_code'=>$ad->head_code,
                        'head_name'=>$ad->head_name,
                        'table_name'=>'child_ones',
                    );
                }
                
            }
        }
        $clientInfo= ClientInfo::all();
        return view('clientPayment.create', compact('clientInfo','paymethod'));
    }
    /**
     * get project information
     */
    public function project_details(Request $request)
    {
        $client_id=$request->client_id;
        $projectinfo=ProjectInfo::select('id','project_name','amount','starting_date','end_date')->where('client_id',$client_id)->get();
        $option="<option value=''>Select Project</option>";
        foreach($projectinfo as $pf){
            $option.="<option value='".$pf->id."'>".$pf->project_name." (".$pf->amount.") ".$pf->starting_date."-".$pf->end_date."</option>";
        }
        echo json_encode($option);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        try{
            //dd($request);
        $cat = new ClientPayment;
        $cat->client_id = $request->client_id;
        $cat->project_info_id = $request->project_info_id;
        $cat->date = $request->date;
        $cat->method = $request->method;
        $cat->amount = $request->amount;
        $cat->save();
        
        return redirect()->route('clientPayment.index');
        }catch(Exception $err){
            dd($err);
            return redirect()->back();

        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ClientPayment  $clientPayment
     * @return \Illuminate\Http\Response
     */
    public function show(ClientPayment $clientPayment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ClientPayment  $clientPayment
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clientPayment = ClientPayment::findOrFail($id);
        $clientInfo= ClientInfo::all();
        return view('clientPayment.edit',compact('clientPayment','clientInfo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ClientPayment  $clientPayment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $clientPayment=ClientPayment::find($id);
        $clientPayment->client_id = $request->client_id;
        $clientPayment->date = $request->date;
        $clientPayment->method = $request->method;
        $clientPayment->invest = $request->invest;
        $clientPayment->return = $request->return;
        $clientPayment->amount = $request->amount;
        $clientPayment->dues = $request->dues;
        $clientPayment->save();
        return redirect()->route('clientPayment.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ClientPayment  $clientPayment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ClientPayment::find($id)->delete();
        return redirect()->back();
    }
}
