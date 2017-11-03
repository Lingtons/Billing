<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shop;
use App\Payment;
use PDF;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
/*        $payments = Payment::all();
        return view('manage.payments.index', compact('payments'));
*/      
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
        'date_recieved' => 'required',
        'amount' => 'required',
        'description' => 'required',
      ]);

    $s_id = $request->shop_id;
        $pay = new Payment();

        $pay->shop_id = $request->shop_id;
        $pay->date_recieved = $request->date_recieved;
        $pay->amount = $request->amount;
        $pay->description = $request->description;

        if ($pay->save()) {
            return redirect()->route('payments.show', $s_id);            
        }else{
            Session::flash('danger', 'Sorry, a problem occured while recording the payment');
            return redirect()->route('payments.show', $s_id);            
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
        
        $shop = Shop::findOrFail($id);
        return view('manage.payments.show', compact('shop'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      
      $payment = Payment::findOrFail($id);
      return view('manage.payments.edit', compact('payment'));
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
        $this->validate($request, [
        'shop_id' => 'required',
        'date_recieved' => 'required',
        'amount' => 'required',
        'description' => 'required',
      ]);

        $s_id = $request->shop_id;
        $pay = Payment::findOrFail($id);
        $pay->shop_id = $request->shop_id;
        $pay->date_recieved = $request->date_recieved;
        $pay->amount = $request->amount;
        $pay->description = $request->description;

        if ($pay->save()) {
            return redirect()->route('payments.show', $s_id);            
        }else{
            Session::flash('danger', 'Sorry, a problem occured while recording the payment');
            return redirect()->route('payments.show', $s_id);            
        }
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
}
