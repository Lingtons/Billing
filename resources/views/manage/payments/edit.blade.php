@extends('layouts.manage')

@section('content')
  <div class="flex-container">
    <div class="columns m-t-10">
      <div class="column">
        <h1 class="title">{{$payment->shop->name}}</h1>
      </div>
      <div class="column">
        <a href="{{route('shops.index')}}" class="button is-primary is-pulled-right "><i class="fa fa-chevron-left m-r-10"></i>Back to Shops</a>
      </div>
    </div>
    <hr class="m-t-0">
    <form action="{{route('payments.update', ['id' => $payment->id ])}}" method="post" role="form">
      
       {{method_field('PUT')}}
                     {{csrf_field()}}
      <div class="columns">
        <div class="column">
          <div class="box">
            <article class="media">
              <div class="media-content">
                <div class="content">
                  <h2 class="title">Edit Payment:</h1>
                  <div class="column">
                      <div class="field">
                      <p class="control">
                      <label for="date_recieved" class="label">Date Recieved</label>
                      <input type="date" class="input" name="date_recieved" id="date_recieved" value = "{{$payment->date_recieved}}" required>
                      <input type="hidden" name="shop_id" value="{{$payment->shop->id}}"  required>
                      </p>
                      </div>
                      
                    </div>
                    <div class="column">
                        <div class="field">
                        <p class="control">
                      <label for="amount" class="label">Amount Recieved</label>
                      <input type="number" class="input" name="amount" id="amount" value = "{{$payment->amount}}" required>
                        </p>
                        </div>
                      
                    </div>
                    <div class="column">

                  <div class="field">
                    <p class="control">
                      <label for="description" class="label">Short Description</label>
                      <input type="text" class="input" name="description"  id="description"  value = "{{$payment->description}}" required>
                    </p>
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

          <button class="button is-primary">Save Changes to Payment</button>
        </div>
      </div>
    </form>
  </div>
@endsection
