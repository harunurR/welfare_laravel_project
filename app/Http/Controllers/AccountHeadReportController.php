<?php

namespace App\Http\Controllers;

use App\Models\AccountHeadReport;
use Illuminate\Http\Request;

class AccountHeadReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accountHeadReport= AccountHeadReport::all();
        return view('accountHeadReport.index', compact('accountHeadReport'));
    }
}