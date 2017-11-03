@extends('layouts.manage')

@section('content')
  <div class="flex-container">
    <div class="columns m-t-10">
      <div class="column">
        <h1 class="title">Edit {{$shop->name}}</h1>
      </div>
      <div class="column">
        <a href="{{route('shops.index')}}" class="button is-primary is-pulled-right "><i class="fa fa-chevron-left m-r-10"></i>Back to Shops</a>
      </div>
    </div>
    <hr class="m-t-0">
    <form action="{{route('shops.update', ['id' => $shop->id ])}}" method="post" role="form">
      
       {{method_field('PUT')}}
                     {{csrf_field()}}
      <div class="columns">
        <div class="column">
          <div class="box">
            <article class="media">
              <div class="media-content">
                <div class="content">
                  <h2 class="title">Shop Details: {{$shop->id}}</h1>
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
<hr>
Outstanding Extra Cost (<small>Sum up all outstanding extra costs in one line</small>)
                  <div class="field">
                    <p class="control">
                      (<small>Clear and Update to remove extra costs</small>)
                      <label for="xtra_desc" class="label">Description</label>
                      <input type="text" class="input" name="outstanding_description" value="{{$shop->outstanding_description}}" id="xtra_desc">
                    </p>
                    <p class="control">
        
                      <label for="xtra_amount" class="label">Total Amount</label>
                      <input type="number" class="input" name="outstanding_cost" value="{{$shop->outstanding_cost}}" id="xtra_amount">
                    </p>
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
