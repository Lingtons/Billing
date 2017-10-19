@extends('layouts.manage')

@section('content')
  <div class="flex-container">
    <div class="columns m-t-10">
      <div class="column">
        <h1 class="title">Edit {{$shop->name}}</h1>
      </div>
    </div>
    <hr class="m-t-0">
    <form action="{{route('shops.update', $shop->id)}}" method="POST">
      {{ csrf_field() }}
      {{ method_field('PUT') }}
      <div class="columns">
        <div class="column">
          <div class="box">
            <article class="media">
              <div class="media-content">
                <div class="content">
                  <h2 class="title">Shop Details:</h1>
                  <div class="field">
                    <p class="control">
                      <label for="name" class="label">Name</label>
                      <input type="text" class="input" name="name" value="{{$shop->name}}" id="name" required>
                    </p>
                  </div>
                  <div class="field">
                    <p class="control">
                      <label for="meter_no" class="label">Meter No.</label>
                      <input type="number" class="input" name="meter_no" value="{{$shop->meter_no}}" id="meter_no"  required>
                    </p>
                  </div>
                  <div class="field">
                    <p class="control">
                      <label for="address" class="label">Address</label>
                      <input type="text" class="input" name="address" value="{{$shop->address}}" id="address"  required>
                    </p>
                  </div>
                  <div class="field">
                    <p class="control">
                      <label for="service_address" class="label">Service Address</label>
                      <input type="text" class="input" value="{{$shop->service_address}}" id="service_address" name="service_address"  required>
                    </p>
                  </div>
                  <div class="field">
                    <p class="control">
                      <label for="last_reading" class="label">Last Reading</label>
                      <input type="number" class="input" name="last_reading" value="{{$shop->last_reading}}" id="last_reading"  required>
                    </p>
                  </div>
                  <div class="field">
                    <label for="owner" class="label">Assign Shop to Owner </label>
                    <div class="select is-fullwidth">
                      <select name = "user_id" id = "owner">
                        @if ($shop->user_id == '')
                        <option value="" selected >Select Owner</option>
                        @else

                      <option value="{{$shop->user->id}}" selected >{{$shop->user->name}}</option>
                      @endif
                      @if(count($users))
                          @foreach($users as $user)
                           <option value="{{$user->id}}">{{$user->name}}</option>
                          @endforeach
                        @endif
              
                      </select>
                    </div>
                      
                    
                    
                  </div>
                  
                </div>
              </div>
            </article>
          </div>
        </div>
      </div>

      <div class="columns">
        <div class="column">

          <button class="button is-primary">Save Changes to Shop</button>
        </div>
      </div>
    </form>
  </div>
@endsection
