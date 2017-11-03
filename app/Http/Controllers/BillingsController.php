<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Billing;
use App\Bill_History;
use App\Shop;
use App\Setting;
use App\Payment;
use PDF;


class BillingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
        'shop_id' => 'required',
        'current_date' => 'required',
        'current_reading' => 'required',
        'access_charge' => 'required',
      ]);

    $s_id = $request->shop_id;
    $bill = Billing::where('shop_id', $s_id)->orderBy('id', 'desc')->first();
    $setting = Setting::find(1);

    $from = \Carbon\Carbon::createFromFormat('Y-m-d', $bill->previous_date);
    $to = \Carbon\Carbon::createFromFormat('Y-m-d', $request->current_date);
    $diff_in_days = $to->diffInDays($from);

        //new billing values
        
        $usage_bill = new Billing();

        $usage_bill->shop_id = $request->shop_id;
        $usage_bill->previous_date = $bill->current_date;
        $usage_bill->current_date = $request->current_date;
        $usage_bill->no_days = $diff_in_days;
        $usage_bill->previous_reading = $bill->current_reading;
        $usage_bill->current_reading = $request->current_reading;
        $usage = $request->current_reading - $bill->current_reading;
        $usage_bill->usage = $usage;
        $usage_bill->billed_usage = $setting->multiplier * $usage;
        $usage_bill->period_charge = $setting->multiplier * $usage * $setting->gas_rate;
        $usage_bill->access_charge = $request->access_charge;
        $usage_bill->statement_date = $setting->statement_date;

        if ($usage_bill->save()) {

            //new bill history manipulations

            $bill_hist = Billing::WHERE('id', '!=', $usage_bill->id)->orWhereNull('id')->get();
            $sum_usage = $bill_hist->sum('period_charge') + $bill_hist->sum('access_charge');

            $pay_hist = Payment::where('shop_id', $s_id)->get();
            $sum_payment = $pay_hist->sum('amount');

            $history = new Bill_History();
            $history->billing_id = $usage_bill->id;
            $history->previous_bill_date = $bill_hist[$bill_hist->count()-1]->current_date;
            $history->previous_pay_date = $pay_hist[$pay_hist->count()-1]->date_recieved;
            $history->previous_bill = $sum_usage;
            $history->previous_pay = $sum_payment;
            $history->save();

            $bills = Billing::where('shop_id', $request->shop_id)->get();
            $shop = Shop::findOrFail($request->shop_id);

            return view('manage.billings.index', compact('bills', 'shop'));
            //return view('manage.billings.index')->withBills($bills)->withShop($shop);
        }else{
            Session::flash('danger', 'Sorry, a problem occured while computing the bill');
            return redirect()->route('shops.index');
        }

    }
    /**s
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bills = Billing::where('shop_id', $id)->get();
        $shop = Shop::findOrFail($id);
        return view('manage.billings.index')->withBills($bills)->withShop($shop);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

        public function new_bill($shop_id)
    {
        
        $shop = Shop::findOrFail($shop_id);
        return view('manage.billings.create')->withShop($shop);
    }

        public function view_bill($bill_id)
    {              
        $bill = Billing::find($bill_id);        
        
       return view('manage.billings.show')->withBill($bill);        
    }

        public function download_bill($bill_id)
    {              
        $bill = Billing::find($bill_id);        
        $title  = $bill->statement_date."-".$bill->shop->name."- LPG Monthly Billing";
        PDF::SetTitle($title);
        PDF::AddPage();
        PDF::writeHtml(view('manage.billings.invoice', compact('bill')));
        PDF::Output($title.'.pdf');                        

//        return view('manage.billings.invoice')->withBill($bill);        

    }
}
