<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Billing;
use App\Shop;
use App\Setting;
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
        PDF::SetTitle('Hello World');
        PDF::AddPage();
        PDF::Write(0, 'Hello World');
        PDF::Output('hello_world.pdf');
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

    //values

    

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
            $bills = Billing::where('shop_id', $request->shop_id)->get();
            $shop = Shop::findOrFail($request->shop_id);
            return view('manage.billings.index')->withBilling($bills)->withShop($shop);
        }else{
            Session::flash('danger', 'Sorry, a problem occured while computing the bill');
            return redirect()->route('shops.index');
        }

    }
    /**
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
        PDF::SetTitle('Hello World');
        PDF::AddPage();
        PDF::writeHtml(view('manage.billings.invoice', compact('bill')));
        PDF::Output('invoice.pdf');                        

//        return view('manage.billings.invoice')->withBill($bill);        

    }
}
