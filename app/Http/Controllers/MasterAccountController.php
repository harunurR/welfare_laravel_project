<?php

namespace App\Http\Controllers;

use App\Models\MasterAccount;
use Illuminate\Http\Request;

class MasterAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $masterAccount= masterAccount::paginate(10);
        return view('masterAccount.index',compact('masterAccount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('masterAccount.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $cat = new masterAccount;
            $cat->head_name = $request->head_name;
            $cat->head_code = $request->head_code;
            $cat->opening_balance = $request->opening_balance;
            $cat->save();
           return redirect()->route('masterAccount.index'); 
        }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MasterAccount  $masterAccount
     * @return \Illuminate\Http\Response
     */
    public function show(MasterAccount $masterAccount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MasterAccount  $masterAccount
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $masterAccount = masterAccount::findOrFail($id);
        return view('masterAccount.edit',compact('masterAccount'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MasterAccount  $masterAccount
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $masterAccount=masterAccount::findOrFail($id);
        $masterAccount->head_name = $request->head_name;
        $masterAccount->head_code = $request->head_code;
        $masterAccount->opening_balance = $request->opening_balance;
        $masterAccount->save();
        return redirect()->route('masterAccount.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MasterAccount  $masterAccount
     * @return \Illuminate\Http\Response
     */
    public function destroy(MasterAccount $masterAccount)
    {
        $masterAccount->delete();
        return redirect()->back();
    }
}
