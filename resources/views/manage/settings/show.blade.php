@extends('layouts.manage')

@section('content')
 
<div class="columns m-t-10 m-l-50">
	<div class="column">
		<h1 class="title">{{$user->name}}</h1>
        <h4 class="subtitle">View User Details</h4>
	</div>
	<div class="column">
			<a href="{{route('users.edit', $user->id)}}" class="button is-primary "><i class="fa fa-chevron-left m-r-10"></i>Edit User</a>

	</div>
</div>
<div class="columns">
<div class="column is-half m-l-50">
                 
                 <div class="field">
                     <label for="name" class="label">Name</label> 
                    <pre> {{$user->name}} </pre>
                 </div>
                 <div class="field">
                     <label for="email" class="label">Email Address</label> 
                     <pre>{{$user->email}}</pre>
                 </div>
                 
        <div class="field">
          <div class="field">
            <label for="email" class="label">Roles</label>
            <ul>
              {{$user->roles->count() == 0 ? 'This user has not been assigned any roles yet' : ''}}
              @foreach ($user->roles as $role)
                <li>{{$role->display_name}} ({{$role->description}})</li>
              @endforeach
            </ul>
          </div>
        </div>

                 </div>
 					
</div>

@endsection

