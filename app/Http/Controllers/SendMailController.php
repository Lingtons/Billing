<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\InvoiceMail;
use App\Billing;
use App\Bill_History;
use App\Shop;
use App\Setting;
use App\Payment;
use PDF;

use Mail;



class SendMailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*$user = auth()->user();
        $setting = Setting::find(1);
        //Mail::to($user)->send(new InvoiceMail($user, $setting));

 $title = "Invoice Message";
        //$content = $request->input('content');
Mail::send('emails.invoice.send', ['title' => $title, 'user' => $user, 'setting' => $setting], function ($message) 
        {

            $message->from('me@gmail.com', 'GWU Corps');

            $message->to('austintappy@gmail.com');


            //Add a subject
            $message->subject("Hello from Scotch");

        });
        
        //return view('emails.invoice.send', compact('user', 'setting'));*/
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
        'bill_id' => 'required',
        'file' => 'required',
      ]);

        $bill_id = $request->bill_id;
        $attach = $request->file('file');

        $bill = Billing::find($bill_id);        
        $title  = $bill->statement_date."-".$bill->shop->name."- LPG Monthly Billing";

        $shop = Shop::find($bill->shop->id);

        $shop_email = $shop->user->email;
        $setting = Setting::find(1);

        dd($shop_email);


        //Mail::to($user)->send(new InvoiceMail($user, $setting));

        
        //$content = $request->input('content');
        Mail::send('emails.invoice.send', ['title' => $title, 'user' => $user, 'setting' => $setting], function ($message) use ($attach, $title, $shop_email, )
        {

            $message->from('me@gmail.com', 'GWU Corps');

            $message->to('austintappy@gmail.com');

            $message->attach($attach, [
                        'as' => $title,
                        'mime' => 'application/pdf',]);

            $message->subject("Hello from Scotch");

        });

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
}
