<?php

namespace App\Http\Controllers;

use App\Models\CreditVoucher;
use App\Models\CreVoucherBkdn;
use App\Models\ChildOne;
use App\Models\ChildTwo;
use App\Models\GeneralLedger;
use App\Models\GeneralVoucher;
use Illuminate\Http\Request;
use DB;
use Session;

class CreditVoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $creditVoucher=CreditVoucher::paginate(10);
        return view('creditVoucher.index',compact('creditVoucher'));
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
                $shead=ChildTwo::where('child_one_id',$ad->id);
                if($shead->count() > 0){
					$shead=$shead->get();
                    foreach($shead as $sh){
                        $paymethod[]=array(
                                        'id'=>$sh->id,
                                        'head_code'=>$sh->head_code,
                                        'head_name'=>$sh->head_name,
                                        'table_name'=>'child_twos'
                                    );
                    }
                }else{
                    $paymethod[]=array(
                        'id'=>$ad->id,
                        'head_code'=>$ad->head_code,
                        'head_name'=>$ad->head_name,
                        'table_name'=>'child_ones'
                    );
                }
                
            }
        }

        return view('creditVoucher.create',compact('paymethod'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function create_voucher_no(){
		$voucher_no="";
		$query = GeneralVoucher::latest()->first();
		if(!empty($query)){
		    $voucher_no = $query->voucher_no;
			$voucher_no+=1;
			$gv=new GeneralVoucher;
			$gv->voucher_no=$voucher_no;
			if($gv->save())
				return $voucher_no;
			else
				return $voucher_no="";
		}else {
			$voucher_no=10000001;
			$gv=new GeneralVoucher;
			$gv->voucher_no=$voucher_no;
			if($gv->save())
				return $voucher_no;
			else
				return $voucher_no="";
		}
    }
    
    public function store(Request $request){
        try {
            DB::beginTransaction();
            $voucher_no = $this->create_voucher_no();
            if(!empty($voucher_no)){
                $jv=new CreditVoucher;
                $jv->voucher_no=$voucher_no;
                $jv->current_date=$request->current_date;
                $jv->pay_name=$request->pay_name;
                $jv->purpose=$request->purpose;
                $jv->credit_sum=$request->debit_sum;
                $jv->debit_sum=$request->debit_sum;
                $jv->cheque_no=$request->cheque_no;
                $jv->bank=$request->bank;
                $jv->cheque_dt=$request->cheque_dt;
                $jv->created_by=Session::get('userId');
				if($request->has('slip')){
					$imageName= rand(111,999).time().'.'.$request->slip->extension();
					$request->slip->move(public_path('uploads/slip'), $imageName);
					$jv->slip=$imageName;
				}
                if($jv->save()){
                    $account_codes=$request->account_code;
                    $table_id=$request->table_id;
                    $credit=$request->credit;
                    $debit=$request->debit;
                    
                    if($credit){
                        $credit=explode('~',$credit);
                        $jvb=new CreVoucherBkdn;
                        $jvb->credit_voucher_id=$jv->id;
                        $jvb->particulars="Received from";
                        $jvb->account_code=$credit[2];
                        $jvb->table_name=$credit[0];
                        $jvb->table_id=$credit[1];
                        $jvb->debit=$request->debit_sum;
                        if($jvb->save()){
                            $table_name=$credit[0];
                            if($table_name=="master_accounts"){$field_name="master_account_id";}
							else if($table_name=="sub_heads"){$field_name="sub_head_id";}
							else if($table_name=="child_ones"){$field_name="child_one_id";}
							else if($table_name=="child_twos"){$field_name="child_two_id";}
							$gl=new GeneralLedger;
                            $gl->credit_voucher_id=$jv->id;
                            $gl->journal_title=$credit[2];
                            $gl->rec_date=$request->current_date;
                            $gl->jv_id=$voucher_no;
                            $gl->crvoucher_bkdn_id=$jvb->id;
                            $gl->created_by=Session::get('userId');
                            $gl->dr=$request->debit_sum;
                            $gl->{$field_name}=$credit[1];
                            $gl->save();
                        }
                    }
					if(sizeof($account_codes)>0){
                        foreach($account_codes as $i=>$acccode){
                            $jvb=new CreVoucherBkdn;
                            $jvb->credit_voucher_id=$jv->id;
                            $jvb->particulars=!empty($request->remarks[$i])?$request->remarks[$i]:"";
                            $jvb->account_code=!empty($acccode)?$acccode:"";
                            $jvb->table_name=!empty($request->table_name[$i])?$request->table_name[$i]:"";
                            $jvb->table_id=!empty($request->table_id[$i])?$request->table_id[$i]:"";
                            $jvb->credit=!empty($request->debit[$i])?$request->debit[$i]:0;
                            if($jvb->save()){
                                $table_name=$request->table_name[$i];
                                if($table_name=="master_accounts"){$field_name="master_account_id";}
    							else if($table_name=="sub_heads"){$field_name="sub_head_id";}
    							else if($table_name=="child_ones"){$field_name="child_one_id";}
    							else if($table_name=="child_twos"){$field_name="child_two_id";}
    							$gl=new GeneralLedger;
                                $gl->credit_voucher_id=$jv->id;
                                $gl->journal_title=!empty($acccode)?$acccode:"";
                                $gl->rec_date=$request->current_date;
                                $gl->jv_id=$voucher_no;
                                $gl->crvoucher_bkdn_id=$jvb->id;
                                $gl->created_by=Session::get('userId');
                                $gl->cr=!empty($request->debit[$i])?$request->debit[$i]:0;
                                $gl->{$field_name}=!empty($request->table_id[$i])?$request->table_id[$i]:"";
                                $gl->save();
                            }
                        }
                    }
                }
                DB::commit();
				return redirect(route('creditVoucher.index'));
			}else{
				return redirect()->back();
			}
		}catch (Exception $e) {
			dd($e);
			DB::rollBack();
			return redirect()->back();
		}
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CreditVoucher  $creditVoucher
     * @return \Illuminate\Http\Response
     */
    public function show(CreditVoucher $creditVoucher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CreditVoucher  $creditVoucher
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $creditVoucher=CreditVoucher::findOrFail($id);
		$crevoucherbkdn=CreVoucherBkdn::where('credit_voucher_id',$id)->get();
		return view('creditVoucher.edit',compact('creditVoucher','crevoucherbkdn'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CreditVoucher  $creditVoucher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cv= CreditVoucher::find($id);
		$cv->current_date = $request->current_date;
		$cv->pay_name = $request->pay_name;
		$cv->purpose = $request->purpose;
		$cv->cheque_no = $request->cheque_no;
		$cv->cheque_dt = $request->cheque_dt;
		$cv->bank = $request->bank;
		if($request->has('slip')){
			$imageName= rand(111,999).time().'.'.$request->slip->extension();
			$request->slip->move(public_path('uploads/slip'), $imageName);
			$cv->slip=$imageName;
		}
        $cv->save();
        return redirect()->route('creditVoucher.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CreditVoucher  $creditVoucher
     * @return \Illuminate\Http\Response
     */
    public function destroy(CreditVoucher $creditVoucher)
    {
        //
    }
}
