<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\Shop;
use App\User;
use App\Billing;
use App\Permission;
use Session;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $shops = Shop::all();
      return view('manage.shops.index')->withShops($shops);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

      return view('manage.shops.create');
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
        'name' => 'required|max:255',
        'meter_no' => 'required|max:50',
        'address' => 'required|max:255',
        'service_address' => 'required|max:255',
        'start_date' => 'required',

        
      ]);

        $shop = new Shop();

        $shop->name = $request->name;
        $shop->meter_no = $request->meter_no;
        $shop->address = $request->address;
        $shop->service_address = $request->service_address;
        
 


        if ($shop->save()) {

            $bill = new Billing();
            $bill->shop_id = $shop->id;
            $bill->previous_date = $request->start_date;
            $bill->current_date = $request->start_date;
            $bill->no_days = 0;
            $bill->previous_reading = 0;
            $bill->current_reading = 0;
            $bill->usage = 0;
            $bill->billed_usage = 0;
            $bill->period_charge = 0;
            $bill->access_charge = 0;
            $bill->save();
            
            return redirect()->route('shops.show', $shop->id);
        }else{
            Session::flash('danger', 'Sorry, a problem occured while creating the shop. ');
            return redirect()->route('shops.create')->withInput();
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
      return view('manage.shops.show')->withShop($shop);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $users = User::all();
      $shop = Shop::findOrFail($id);
      return view('manage.shops.edit')->withShop($shop)->withUsers($users);
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
        'name' => 'required|max:255',
        'meter_no' => 'required|max:50',
        'address' => 'required|max:255',
        'service_address' => 'required|max:255',
        'user_id' => 'sometimes|max:10',
        'outstanding_description' => 'sometimes',
        'outstanding_cost' => 'sometimes',
        

      ]);

      $shop = Shop::findOrFail($id);
      $shop->name = $request->name;
      $shop->meter_no = $request->meter_no;
      $shop->address = $request->address;
      $shop->service_address = $request->service_address;
      $shop->user_id = $request->user_id;
      $shop->outstanding_description = $request->outstanding_description;
      $shop->outstanding_cost = $request->outstanding_cost;

      if ($shop->save()) {
            return redirect()->route('shops.show', $id);
        }else{
            Session::flash('danger', 'Sorry, a problem occured while updating the shop. ');
            return redirect()->route('shops.edit', $id)->withInput();
        
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
