@extends('layouts.manage')

@section('content')

    <div class="columns m-t-10">
      <div class="column">
        <h1 class="title">Compute Usage Bill</h1>
      </div>
    <div class="column">
        <a href="{{route('billing.show', $shop->id)}}" class="button is-primary is-pulled-right "><i class="fa fa-chevron-left m-r-10"></i>Back to Bills</a>
      </div>
    </div> 

    <hr class="m-t-0">
    <form action="{{route('billing.store')}}" method="POST">
      {{ csrf_field() }}
      <div class="columns">
        <div class="column">
          <div class="box">
            <article class="media">
              <div class="media-content">
                <div class="content">
                  <h2 class="title">{{$shop->name}}</h1>
                  <div class="columns">
                    <div class="column">
                      <div class="field">
                      <p class="control">
                      <label for="current_date" class="label">Reading date</label>
                      <input type="date" class="input" name="current_date" id="current_date" required>
                      <input type="hidden" name="shop_id" value="{{$shop->id}}"  required>
                      </p>
                      </div>
                      
                    </div>
                    <div class="column">
                        <div class="field">
                        <p class="control">
                      <label for="current_reading" class="label">Current Reading</label>
                      <input type="number" class="input" name="current_reading" id="current_reading"  required>
                        </p>
                        </div>
                      
                    </div>
                    <div class="column">

                  <div class="field">
                    <p class="control">
                      <label for="access_charge" class="label">Meter Access Charge</label>
                      <input type="number" class="input" name="access_charge"  id="access_charge"  required>
                    </p>
                  </div>
                      
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
          

          <button class="button is-primary"><i class="fa fa-money m-r-10"></i> Compute Bill</button>
        </div>
      </div>
    </form>

@endsection
