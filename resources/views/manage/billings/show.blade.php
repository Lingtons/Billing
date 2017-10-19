@extends('layouts.manage')

@section('content')
  
    <div class="columns m-t-10">
      <div class="column">
        <h1 class="title">{{$bill->shop->name}}<small class="m-l-25"><em>({{$bill->shop->meter_no}})</em></small></h1>
        <h5>{{$bill->shop->service_address}}</h5>
      </div>
      <div class="column">
        
      </div>
    </div>
    <hr class="m-t-0">


    <div class="columns">
      <div class="column">
        <div class="box">
          <article class="media">
            <div class="media-content">
              <div class="content">
                                    <table class="table is-bordered is-striped">
          <thead>
            <tr>
              <th>Customer Name</th>
              <td>{{$bill->shop->name}}</td>
            </tr>
            <tr>
              <th>Address</th>
              <td>{{$bill->shop->address}}</td>
            </tr>
            <tr>
              <th>Service Address</th>
              <td>{{$bill->shop->service_address}}</td>
            </tr>
            <tr>
              <th>Meter ID</th>
              <td>{{$bill->shop->meter_no}}</td>
            </tr>            
            <tr>
              <th>Gas Rate / m3</th>
              <td>{{$bill->period_charge / $bill->billed_usage}}</td>
            </tr>             
            <tr>
              <th>Statement Date</th>
              <td>{{$bill->statement_date}}</td>
            </tr>
                       
          </thead>

          <tbody>

              
              

          </tbody>
        </table>
    
                        <table class="table is-bordered is-striped is-narrow is-fullwidth">
          <thead>
            <tr>
              <th>Item</th>
              <th>Duration</th>
              <th>Previous Read Date</th>
              <th>Previous Meter Read</th>
              <th>Current Read Date</th>
              <th>Current Meter Read</th>
              <th>Usage</th>
              <th>Multiplier</th>
              <th>Billed Usage</th>
            </tr>
          </thead>
          <tbody>
              <tr>
               <td>Centralized Supply</td>
                <td>{{$bill->no_days}}</td>
                <td>{{$bill->previous_date}}</td>
                <td>{{$bill->previous_reading}}</td>
                <td>{{$bill->current_date}}</td>
                <td>{{$bill->current_reading}}</td>
                <td>{{$bill->usage}}</td>
                <td>{{$bill->billed_usage / $bill->usage}}</td>
                <td>{{$bill->billed_usage}}</td>
              </tr>
              <tr>
                <td>Current Usage</td>
                <td>{{$bill->billed_usage}}</td>
              </tr>
              <tr>
                <td>Meter Access Charge</td>
                <td>{{$bill->access_charge}}</td>
              </tr>
              <tr>
                <td>Gas Charge for Period</td>
                <th>{{$bill->period_charge}}</th>
              </tr>
              <tr>
                <td></td>
                
              </tr>
              <tr>
                <td>Total Current Charges</td>
                <th>{{$bill->access_charge + $bill->period_charge}}</th>
              </tr>

              

          </tbody>
        </table>
              </div>
            </div>
          </article>
          <a href="{{url('manage/download_invoice', $bill->id )}}" class="button">Download Invoice</a>
        </div>
      </div>
    </div>

@endsection
