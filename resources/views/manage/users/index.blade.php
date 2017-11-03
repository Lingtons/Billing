@extends('layouts.manage')

@section('content')
 
<div class="columns m-t-10">
	<div class="column">
		<h1 class="title">Manage Users</h1>
	</div>
	<div class="column">
			<a href="{{route('users.create')}}" class="button is-primary is-pulled-right "><i class="fa fa-user m-r-10"></i>Create New User</a>
	</div>
</div>
<hr class="m-t-10">

 					<table class="table is-striped is-narrow is-fullwidth" id="example">
 			<thead>
 				<tr>
 					<th>Name</th>
 					<th>Email</th>
 					<th>Date Created</th>
 					<th>Action</th>
 				</tr>
 			</thead>
 			<tbody>
 				@foreach($users as $user)
 				<tr>
 					<th> <a href="{{route('users.show', $user->id )}}" class="has-text-black">{{$user->name}}</a> </th>
 					<th><a href="{{route('users.show', $user->id )}}" class="has-text-black"> {{$user->email}} </a></th>
 					<th> <a href="{{route('users.show', $user->id )}}" class="has-text-black"> {{$user->created_at->toFormattedDateString()}} </a></th>
 					<th><a href="{{route('users.edit', $user->id)}}" class="button is-small is-outlined">Edit</i></a></th>
 				</tr>
 				@endforeach
 			</tbody>
 		</table>
 					
 				


@endsection
