@extends('layouts.manage')

@section('content')

    <div class="columns m-t-10">
      <div class="column">
        <h1 class="title">Manage Shops</h1>
      </div>
      <div class="column">
        <a href="{{route('shops.create')}}" class="button is-primary is-pulled-right"><i class="fa fa-user-plus m-r-10"></i> Create New Shop</a>
      </div>
    </div>
    <hr class="m-t-0">

    <div class="columns is-multiline">
      @foreach ($shops as $shop)
        <div class="column is-one-quarter">
          <div class="box">
            <article class="media">
              <div class="media-content">
                <div class="content">
                  <h3 class="title">{{$shop->name}}</h3>
                  <h4 class="subtitle"><em>{{$shop->meter_no}}</em></h4>
                  <p>
                    Address : {{$shop->address}}
                  </p>
                  <p>
                    S. Address : {{$shop->service_address}}
                  </p>
                  <p>
                    Last M-reading : {{$shop->last_reading}}
                  </p>
                </div>

                <div class="columns is-mobile">
                  <div class="column is-one-half">
                    <a href="{{route('shops.show', $shop->id)}}" class="button is-primary is-fullwidth">Details</a>
                  </div>
                  <div class="column is-one-half">
                    <a href="{{route('shops.edit', $shop->id)}}" class="button is-light is-fullwidth">Edit</a>
                  </div>
                </div>

                                <div class="columns is-mobile">
                  <div class="column is-one-half">
                    <a href="{{route('billing.show', $shop->id)}}" class="button is-info is-fullwidth">Usage</a>
                  </div>
                  <div class="column is-one-half">
                    <a href="{{route('shops.edit', $shop->id)}}" class="button is-success is-fullwidth">Payments</a>
                  </div>
                </div>
              </div>
            </article>
          </div>
        </div>
      @endforeach
    </div>

@endsection
