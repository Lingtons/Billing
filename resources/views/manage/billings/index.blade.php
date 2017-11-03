@extends('layouts.manage')

@section('content')
  
    <div class="columns m-t-10">
      <div class="column">
        <h1 class="title">{{$shop->name}}<small class="m-l-25"><em>({{$shop->meter_no}})</em></small></h1>
        <h5>{{$shop->service_address}}</h5>
      
      </div>
      <div class="column">
        <a href="{{route('shops.index')}}" class="button is-primary is-pulled-right "><i class="fa fa-chevron-left m-r-10"></i>Back to Shops</a>
      </div>
    </div>
    <hr class="m-t-0">

    <div class="columns">
      <div class="column">
        <div class="box">
          <article class="media">
            <div class="media-content">
              <div class="content">
                  <a href="{{url('manage/new_bill', $shop->id)}}" class="button is-primary is-pulled-right"><i class="fa fa-money m-r-10"></i> Compute New Bill </a>
                <h2 class="title">Record:</h1>
                          <table id="example" class="table is-bordered is-striped is-narrow is-fullwidth">
          <thead>
            <tr>
              <th>Statement Date</th>
              <th>Billed Usage</th>
              <th>Period Gas</th>
              <th>Action</th>
            </tr>
          </thead>

          <tbody>
            @foreach ($bills as $bill)
              <tr>
<th>{{$bill->statement_date}}</th>
<td>{{$bill->billed_usage}}</td>
<td>{{$bill->period_charge}}</td>
<td class="has-text-centered"><a class="button is-outlined is-small m-r-5" href="{{url('manage/view_bill', $bill->id)}}"  >View</a>
<a href="#" m-id = "{{$bill->id}}" onclick="getModal(this);" class="button is-outlined is-small" >Mail</a>
</td>
<div class="modal" id = "showModal{{$bill->id}}" >

  <div class="modal-background"></div>
  <div class="modal-content">
    <div class="box">
      <article class="media">
        <div class="media-content">
          <div class="content">
            <p>
              <strong>{{$bill->id}}</strong> <small>{{$bill->usage}}</small> <small>{{$bill->billed_usage}}</small>
              <br>

<form method="post" action="{{ route('sendmail.store') }}" data-parsley-validate class="form-horizontal form-label-left"  enctype="multipart/form-data">
{{ csrf_field() }}
              <div class="file">
  <label class="file-label">
    <input class="file-input" type="file" name="file">
    <input class="" type="hidden" name="bill_id" value="{{$bill->id}}">
    <span class="file-cta">
      <span class="file-icon">
        <i class="fa fa-upload"></i>
      </span>
      <span class="file-label">
        Choose a file…
      </span>
    </span>
  </label>
    <input type="hidden" name="_token" value="{{ Session::token() }}">
    <button type="submit" class="btn btn-success">Mail Invoice</button>
</div>

                        
                    </form>
            </p>
          </div>
        </div>
      </article>
    </div>
  </div>
  <button class="modal-close is-large"></button>

</div>


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
<script>
  function getModal(el)
  {
     mID = $(el).attr('m-id');
    $("#showModal"+mID).addClass("is-active");  
  }

</script>
  
@endsection
