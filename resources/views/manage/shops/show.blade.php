@extends('layouts.manage')

@section('content')
  
    <div class="columns m-t-10">
      <div class="column">
        <h1 class="title">{{$shop->name}}<small class="m-l-25"><em>({{$shop->meter_no}})</em></small></h1>
        <h5>{{$shop->service_address}}</h5>
      </div>
      <div class="column">
        <a href="{{route('shops.edit', $shop->id)}}" class="button is-primary is-pulled-right"><i class="fa fa-user-plus m-r-10"></i> Edit this Shop</a>
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
                <!-- place record table here -->
              </div>
            </div>
          </article>
        </div>
      </div>
    </div>

@endsection
