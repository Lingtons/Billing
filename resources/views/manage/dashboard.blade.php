@extends('layouts.manage')

@section('content')



<div class="columns m-t-10">
	<div class="column">
		<h1 class="title">Management Dashboard</h1>
	</div>

</div>
<hr class="m-t-10">

 					<table class="table is-bordered is-striped is-narrow is-fullwidth">
 			<thead>
 				<tr>
 					<th>Shop</th>
 					<th>Basic Usage Bill</th>
 					<th> Usage Ending On</th>
 					<th>Payment</th>
 					<th> Paid On </th>
 					
 				</tr>
 			</thead>
 			<tbody>
 				@foreach($bills as $bill)
 				@if(count($bill->bill_history))
 				<tr>
 					<td> {{$bill->shop->name}} </td>
 					<td> {{$bill->bill_history->previous_bill}} </td>
 					<td> {{$bill->bill_history->previous_bill_date->toFormattedDateString()}} </td>
 					<td> {{$bill->bill_history->previous_pay}} </td>
 					<td> {{$bill->bill_history->previous_pay_date->toFormattedDateString()}} </td>
 				</tr>
 				@endif
 				@endforeach
 			</tbody>
 		</table>

@endsection
