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
    padding: 5px;
    border-radius: 5px
    color:#263238;
    font-size: 12px;
  }
  th.htext{
    border:0.5px thin #424242;
    padding: 5px;
    border-radius: 5px
    color:#263238;
    font-size: 12px;
  }

  td.cdata{
   border:0.5px thin #424242;
    border-radius: 5px
    color:#263238; 
    font-size: 10px;
  }

  th.cdata{
    border:0.5px thin #424242;
    padding: 2px;
    color:#263238; 
    font-size: 10px;
  }

  
</style>  
    <div  id="app">
        
    <h1 class="title">{{$bill->shop->name}}<small class="m-l-25"><em>({{$bill->shop->meter_no}})</em></small></h1>
        <h5>{{$bill->shop->service_address}}</h5>
      

    
    <hr class="m-t-0">


    <div class="columns">
      <div class="column">
        <div class="box">
          <article class="media">
            <div class="media-content">
              <div class="content">
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
              <td class="btext">{{$bill->period_charge / $bill->billed_usage}}</td>
            </tr>             
            <tr>
              <th class="htext">Statement Date</th>
              <td class="btext">{{$bill->statement_date}}</td>
            </tr>
                       
          </thead>

          <tbody>

              
              

          </tbody>
        </table>
    
                        <table class="small-table">
          <thead>
            <tr>
              <th class="cdata">Item</th>
              <th class="cdata">Days</th>
              <th class="cdata">P-Read Date</th>
              <th class="cdata">P-Meter Read</th>
              <th class="cdata">C-Read Date</th>
              <th class="cdata">C-Meter Read</th>
              <th class="cdata">Usage</th>
              <th class="cdata">Multiplier</th>
              <th class="cdata">Billed Usage</th>
            </tr>
          </thead>
          <tbody>
              <tr>
                <td class="cdata">Centralized Supply</td>
                <td class="cdata">{{$bill->no_days}}</td>
                <td class="cdata">{{$bill->previous_date}}</td>
                <td class="cdata">{{$bill->previous_reading}}</td>
                <td class="cdata">{{$bill->current_date}}</td>
                <td class="cdata">{{$bill->current_reading}}</td>
                <td class="cdata">{{$bill->usage}}</td>
                <td class="cdata">{{$bill->billed_usage / $bill->usage}}</td>
                <td class="cdata">{{$bill->billed_usage}}</td>
              </tr>
              <tr>
                <td>
                  Data
                </td>
              </tr>
          </tbody>
        </table>

        <table>
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
                <td class="cdata">Gas Charge for Period</td>
                <th class="cdata">{{$bill->period_charge}}</th>
              </tr>
              <tr>
                <td></td>
                
              </tr>
              <tr>
                <td class="cdata">Total Current Charges</td>
                <th class="cdata">{{$bill->access_charge + $bill->period_charge}}</th>
              </tr>
          </thead>
        </table>
              </div>
            </div>
          </article>
        </div>


  </div>

</div>
 
    </div>
   <!-- Scripts -->
     

</body>

</html>
