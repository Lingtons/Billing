     <!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ config('app.name', 'GWU ') }}</title>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>
<style>
  td.btext{
    border:0.5px thin #424242;
    border-radius: 5px
    color:#263238;
    font-size: 10px;
  }
  th.htext{
    border:0.5px thin #424242;
    border-radius: 5px
    color:#263238;
    font-size: 10px;
  }

  td.cdata{
   border:0.5px thin #424242;
    border-radius: 5px;
    color:#263238; 
    font-size: 10px;
  }

  th.cdata{
    border:0.5px thin #424242;
    color:#263238; 
    font-size: 10px;
  }

  
</style>  
    <div  id="app">
        
    <h1 class="title" style="color:green;">GWU Global Management LTD </h1>
    <small class="m-l-25"><em>Plot 211, Adetokubo Ademola Crescent, Cadastral Zone, Wuse 2, Abuja FCT, Nigeria</em></small>
        <h5 style="color:maroon;">GT Bank – GWU Global Management LTD – Acct:0149638251 – Sort Code:058083215 </h5>
      

    
    <hr class="m-b-10">
    <h5>Customer Information</h5>


                     <table cellpadding="5" >
          <thead>
            <tr>
              <th class="htext">Customer Name</th>
              <td class="btext">{{$bill->shop->name}}</td>
            </tr>
            <tr>
              <th class="htext">Address</th>
              <td class="btext">{{$bill->shop->address}}</td>
            </tr>
            <tr>
              <th class="htext">Service Address</th>
              <td class="btext">{{$bill->shop->service_address}}</td>
            </tr>
            <tr>
              <th class="htext">Meter ID</th>
              <td class="btext">{{$bill->shop->meter_no}}</td>
            </tr>            
            <tr>
              <th class="htext">Gas Rate / m3</th>
              <td class="btext">{{$bill->billed_usage == 0 ? $bill->period_charge / 1 : $bill->period_charge / $bill->billed_usage}}</td>
            </tr>             
            <tr>
              <th class="htext">Statement Date</th>
              <td class="btext">{{$bill->statement_date}}</td>
            </tr>
                       
          </thead>

          <tbody>

              
              

          </tbody>
        </table>
        <h5>Usage Information (Centralized Supply)</h5>
    
                        <table class="small-table" cellpadding="2" align="center">
          <thead>
            <tr>
              
              <th class="cdata">Number of Days</th>
              <th class="cdata">Previous Read Date</th>
              <th class="cdata">Previous Meter Read</th>
              <th class="cdata">Current Read Date</th>
              <th class="cdata">Current Meter Read</th>
              
            </tr>
          </thead>
          <tbody>
              <tr>
            
                <td class="cdata">{{$bill->no_days}}</td>
                <td class="cdata">{{$bill->previous_date}}</td>
                <td class="cdata">{{$bill->previous_reading}}</td>
                <td class="cdata">{{$bill->current_date}}</td>
                <td class="cdata">{{$bill->current_reading}}</td>
                
              </tr>
              
          </tbody>

        </table>
        <h5></h5>


                        <table class="small-table" cellpadding="2" align="center">
          <thead>
            <tr>

              <th class="cdata">Usage</th>
              <th class="cdata">Multiplier</th>
              <th class="cdata">Billed Usage</th>
            </tr>
          </thead>
          <tbody>
              <tr>
                <td class="cdata">{{$bill->usage}}</td>
                <td class="cdata">{{$bill->usage == 0 ? $bill->billed_usage / 1 : $bill->billed_usage / $bill->usage}}</td>
                <td class="cdata">{{$bill->billed_usage}}</td>
              </tr>
              
          </tbody>

        </table>

@if(count($bill->bill_history))
                <h5>Immediate History</h5>
        <table cellpadding="3">
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
              <tr>
                <td></td>
                
              </tr>

          </thead>
        </table>
@else
        <?php $bal = 0; ?>
@endif
        <h5>Charges</h5>
        <table cellpadding="3">
          <thead>
                          <tr>
                <td class="cdata">Current Usage</td>
                <td class="cdata">{{$bill->billed_usage}}</td>
              </tr>
              <tr>
                <td class="cdata">Meter Access Charge</td>
                <td class="cdata">{{$bill->access_charge}}</td>
              </tr>
              <tr>
                <td class="cdata">Gas Charge for this Period</td>
                <th class="cdata">{{$bill->period_charge}}</th>
              </tr>
              <tr>
                <td class="cdata">Total Charge for this Period</td>
                <th class="cdata">{{$bill->period_charge + $bill->access_charge }}</th>
              </tr>
              <tr>
                <td colspan="2">Outstanding Extra Costs (<small>Note that extra costs are not added as part of previous bill because it is not tied to a particular bill </small>)</td>
              </tr>
              <tr>
                <td class="cdata">{{$bill->shop->outstanding_description}}</td>
                <th class="cdata">{{$bill->shop->outstanding_cost}}</th>
              </tr>
              <tr>
                <td></td>
              </tr>
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
          </thead>
        </table>
 
    </div>
   <!-- Scripts -->
     

</body>

</html>
