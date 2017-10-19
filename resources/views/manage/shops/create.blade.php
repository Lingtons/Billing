@extends('layouts.manage')

@section('content')

    <div class="columns m-t-10">
      <div class="column">
        <h1 class="title">Create New Shop</h1>
      </div>
    </div>
    <hr class="m-t-0">
    <form action="{{route('shops.store')}}" method="POST">
      {{ csrf_field() }}
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
                      <input type="text" class="input" name="name" value="{{old('name')}}" id="name" required>
                    </p>
                  </div>
                  <div class="field">
                    <p class="control">
                      <label for="meter_no" class="label">Meter No.</label>
                      <input type="number" class="input" name="meter_no" value="{{old('meter_no')}}" id="meter_no"  required>
                    </p>
                  </div>
                  <div class="field">
                    <p class="control">
                      <label for="address" class="label">Address</label>
                      <input type="text" class="input" name="address" value="{{old('address')}}" id="address"  required>
                    </p>
                  </div>
                  <div class="field">
                    <p class="control">
                      <label for="service_address" class="label">Service Address</label>
                      <input type="text" class="input" value="{{old('service_address')}}" id="service_address" name="service_address"  required>
                    </p>
                  </div>
                  <div class="field">
                    <p class="control">
                      <label for="start_date" class="label">Meter Start Date</label>
                      <input type="date" class="input" id="start_date" name="start_date"  required>
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
          

          <button class="button is-primary">Create new Shop</button>
        </div>
      </div>
    </form>

@endsection
