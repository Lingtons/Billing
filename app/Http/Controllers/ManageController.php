<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Billing;
class ManageController extends Controller
{
    public function dashboard()
    {
    	$bills  = Billing::with('bill_history')->get();
    	//dd($bills);
    	return view('manage.dashboard', compact('bills'));
    }

    public function index()
    {
    	return redirect()->route('manage.dashboard');
    }
}
