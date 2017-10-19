@extends('layouts.manage')

@section('content')
  
    <div class="columns m-t-10">
      <div class="column">
        <h1 class="title">{{$shop->name}}<small class="m-l-25"><em>({{$shop->meter_no}})</em></small></h1>
        <h5>{{$shop->service_address}}</h5>
      
      </div>
      <div class="column">
        <a href="{{url('manage/new_bill', $shop->id)}}" class="button is-primary is-pulled-right"><i class="fa fa-user-plus m-r-10"></i> Compute Usage Bill </a>
      </div>
    </div>
    <hr class="m-t-0">

    <div class="columns">
      <div class="column">
        <div class="box">
          <article class="media">
            <div class="media-content">
              <div class="content">
                <h2 class="title">Record:</h1>
                                   <table class="table is-bordered is-striped is-narrow is-fullwidth">
          <thead>
            <tr>
              <th>Statement Date</th>
              <th>Billed Usage</th>
              <th>Period Gas</th>
              <th></th>
            </tr>
          </thead>

          <tbody>
            @foreach ($bills as $bill)
              <tr>
<th>{{$bill->statement_date}}</th>
<td>{{$bill->billed_usage}}</td>
<td>{{$bill->period_charge}}</td>
<td class="has-text-centered"><a class="button is-outlined is-small m-r-5" href="{{url('manage/view_bill', $bill->id)}}">View</a><a class="button is-outlined is-small" href="{{route('permissions.edit', $bill->id)}}">Edit</a></td>
              </tr>
              
            @endforeach
          </tbody>
        </table>

              </div>
            </div>
          </article>
        </div>
      </div>
    </div>

@endsection
