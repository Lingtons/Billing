@extends('layouts.manage')

@section('content')
<div class="columns m-t-10">
  <div class="column">
    <h1 class="title">Manage Payments</h1>
  </div>
<div class="column">
        <a href="{{route('shops.index')}}" class="button is-primary is-pulled-right "><i class="fa fa-chevron-left m-r-10"></i>Back to Shops</a>
      </div>
</div>


                    <form action="{{route('payments.store')}}" method="POST">
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
                      <label for="date_recieved" class="label">Date Recieved</label>
                      <input type="date" class="input" name="date_recieved" id="date_recieved" required>
                      <input type="hidden" name="shop_id" value="{{$shop->id}}"  required>
                      </p>
                      </div>
                      
                    </div>
                    <div class="column">
                        <div class="field">
                        <p class="control">
                      <label for="amount" class="label">Amount Recieved</label>
                      <input type="number" class="input" name="amount" id="amount"  required>
                        </p>
                        </div>
                      
                    </div>
                    <div class="column">

                  <div class="field">
                    <p class="control">
                      <label for="description" class="label">Short Description</label>
                      <input type="text" class="input" name="description"  id="description"  required>
                    </p>
                  </div>
                       
                    </div>
                  </div>
                  <button class="button is-primary" onclick="return confirm('Are you ?, note that this entry cannot be reversed nor modified !')">Record Payment</button>

                </div>
              </div>
            </article>
          </div>
        </div>
      </div>
    </form>

<br>
<table id="example" class="table is-bordered is-striped is-narrow is-fullwidth m-t-10">

      <thead>
        <tr>
          <th>Date Recieved</th>
          <th>Amount</th>
          <th>Short Description</th>

        </tr>
      </thead>
      <tbody>
        @foreach($shop->payments as $payment)
        <tr>
          <td>{{$payment->date_recieved->toFormattedDateString()}}</td>
          <td>{{$payment->amount}}</td>
          <td>{{$payment->description}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
          

@endsection
