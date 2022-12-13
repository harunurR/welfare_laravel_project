<?php

namespace App\Http\Controllers;

use App\Models\ReceptPaymentAccount;
use Illuminate\Http\Request;

class ReceptPaymentAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $receptPaymentAccount= ReceptPaymentAccount::all();
        return view('receptPaymentAccount.index', compact('receptPaymentAccount'));
    }
}
