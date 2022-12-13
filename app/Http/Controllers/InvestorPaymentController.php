<?php

namespace App\Http\Controllers;

use App\Models\InvestorPayment;
use App\Models\InvestorInformation;
use App\Models\ChildOne;
use App\Models\ChildTwo;
use App\Models\MonthlyFees;
use Illuminate\Http\Request;

class InvestorPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $investorPayment= InvestorPayment::paginate(10);
        return view('investorPayment.index',compact('investorPayment'));
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
        $investor= InvestorInformation::get();
        return view('investorPayment.create',compact('investor','paymethod'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function paymentajax(Request $request)
    {
        $investor_id=$request->investor_id;
        $fees_month=$request->fees_month;
        $fees=MonthlyFees::where('month',$fees_month)->sum('amount');
        $number_shares=InvestorInformation::where('id',$investor_id)->pluck('number_shares');
        $due=InvestorInformation::where('id',$investor_id)->sum('due');
        $pay_already=investorPayment::where('fees_month',$fees_month)->where('investor_id',$investor_id)->sum('amount');
        $actual_amount=investorPayment::where('fees_month',$fees_month)->where('investor_id',$investor_id)->sum('actual_amount');
        $res=array('fees'=>$fees,'due'=>$due,'pay_already'=>$pay_already,'actual_amount'=>$actual_amount,'number_shares'=>$number_shares);
        echo json_encode($res);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cat = new investorPayment;
        $cat->investor_id = $request->investor_id;
        $cat->fees_month = $request->fees_month;
        $cat->date = $request->date;
        $cat->book_no = $request->book_no;
        $cat->receipt_no = $request->receipt_no;
        if($request->has('picture')){
            $imageName= rand(111,999).time().'.'.$request->picture->extension();
            $request->picture->move(public_path('uploads/investorPayment'), $imageName);
            $cat->picture=$imageName;
        }

        $cat->payment_method = $request->payment_method;
        $cat->number_of_share = $request->number_of_share;
        $cat->amount = $request->amount;
        $cat->actual_amount = $request->totalpayable;
        
        $cat->account_status = 0;
        if($cat->save()){
            $duesave=InvestorInformation::where('id',$request->investor_id)->first();
            $due=$duesave->due;
            $totalpayable=$request->totalpayable;
            $amount=$request->amount;
            if($totalpayable > $amount){
                $due+=($totalpayable - $amount);
            }else if($totalpayable < $amount){
                $due-=($amount - $totalpayable);
            }
            $duesave->due=$due;
            $duesave->save();
        }
        return redirect()->route('investorPayment.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InvestorPayment  $investorPayment
     * @return \Illuminate\Http\Response
     */
    public function show(InvestorPayment $investorPayment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InvestorPayment  $investorPayment
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $investorPayment = InvestorPayment::findOrFail($id);
        return view('investorPayment.edit',compact('investorPayment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\InvestorPayment  $investorPayment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $investorPayment=investorPayment::find($id);
        $investorPayment->investor_id = $request->investor_id;
        $investorPayment->name = $request->name;
        $investorPayment->date = $request->date;
        $investorPayment->book_no = $request->book_no;
        $investorPayment->receipt_no = $request->receipt_no;
        $investorPayment->picture = $request->picture;
        $investorPayment->particulars = $request->particulars;
        $investorPayment->payment_method = $request->payment_method;
        $investorPayment->collection_for_month = $request->collection_for_month;
        $investorPayment->amount = $request->amount;
        $investorPayment->per_share_amount = $request->per_share_amount;
        $investorPayment->total_deposits = $request->total_deposits;
        $investorPayment->dues = $request->dues;
        $investorPayment->advance = $request->advance;
        $investorPayment->account_status = $request->account_status;
        $investorPayment->save();
        return redirect()->route('investorPayment.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InvestorPayment  $investorPayment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        InvestorPayment::find($id)->delete();
        return redirect()->back();
    }
}
