@extends('layouts.manage')

@section('content')
  
    <div class="columns m-t-10">
      <div class="column">
        <h1 class="title">{{$bill->shop->name}}<small class="m-l-25"><em>({{$bill->shop->meter_no}})</em></small></h1>
        <h5>{{$bill->shop->service_address}}</h5>
      </div>
      <div class="column">
        <a href="{{route('billing.show', $bill->shop->id)}}" class="button is-primary is-pulled-right "><i class="fa fa-chevron-left m-r-10"></i>Back to Bills</a>
      </div>
    </div>
    <hr class="m-t-0">


    <div class="columns">
      <div class="column">
        <div class="box">
          <article class="media">
            <div class="media-content">
              <div class="content">
        <a href="{{url('manage/download_invoice', $bill->id )}}" class="button m-b-10">Download Invoice</a>
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
              <td>{{ $bill->billed_usage == 0 ? $bill->period_charge / 1 : $bill->period_charge / $bill->billed_usage }}</td>

              
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
                <td>{{$bill->usage == 0 ? $bill->billed_usage / 1 : $bill->billed_usage / $bill->usage}}</td>
                <td>{{$bill->billed_usage}}</td>
              </tr>

          </tbody>
        </table>
        <table class="table is-bordered is-striped is-narrow is-fullwidth">
        <tbody>
          
        
        
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
                <td>{{$bill->shop->outstanding_description}}</td>
                <th>{{$bill->shop->outstanding_cost}}</th>
              </tr>
              </tbody>  
</table>
@if(count($bill->bill_history))
                        <h5>Immediate History</h5>
        <table class="table is-bordered is-striped is-narrow is-fullwidth">
          <thead>
                          <tr>
                <td class="cdata">Item</td>
                <td class="cdata">Date</td>
                <td class="cdata">Amount</td>

              </tr>
                <tr>
                <td class="cdata">Previous Bill</td>
                <td class="cdata">{{$bill->bill_history->previous_bill_date}}</td>
                <td class="cdata">{{$bill->bill_history->previous_bill}}</td>

              </tr>
              <tr>
                <td class="cdata">Previous Payment</td>
                <td class="cdata">{{$bill->bill_history->previous_pay_date}}</td>
                <td class="cdata">{{$bill->bill_history->previous_pay}}</td>
              </tr>
              <tr>
            <?php $bal = $bill->bill_history->previous_bill - $bill->bill_history->previous_pay;
              if($bal < 0){
                $status = "In Excess";
              }else{
                $status = "To Balance";
              }
             ?>
                <td class="cdata">Previous Balance</td>
                <td class="cdata"></td>
                <td class="cdata">{{abs($bal)}} ({{$status}})</td>
              </tr>
          </thead>
        </table>
        <!-- <tr>
                <td>Total Current Charges</td>
                <th>{{$bill->access_charge + $bill->period_charge}}</th>
              </tr> -->
@else
            <?php $bal = 0; ?>          
@endif
<tr>
                <td class="cdata">Total Current Charges</td>

<?php $cur = $bill->access_charge + $bill->period_charge + $bill->shop->outstanding_cost; ?>

@if($bal < 0)
  @if(($bal+$cur) <= 0)
 <th class="cdata">No Payment Required : You have {{abs($bal + $cur) }} in Excess </th>
  @else
<th class="cdata">{{abs($bal + $cur)}}</th>
  @endif
@else
<th class="cdata">{{abs($bal + $cur)}}</th>
@endif

              </tr>
              </div>
            </div>
          </article>

        </div>
      </div>
    </div>

@endsection
