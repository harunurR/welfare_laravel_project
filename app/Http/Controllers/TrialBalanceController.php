<?php

namespace App\Http\Controllers;

use App\Models\TrialBalance;
use Illuminate\Http\Request;

class TrialBalanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trialBalance= TrialBalance::all();
        return view('trialBalance.index', compact('trialBalance'));
    }
}