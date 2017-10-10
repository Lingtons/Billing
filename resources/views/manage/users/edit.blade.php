@extends('layouts.manage')

@section('content')
 @if (session('status'))
                        <div class="notification is-success">
                            {{ session('status') }}
                        </div>
                    @endif
<div class="columns m-t-10">
	<div class="column">
		<h1 class="title">Edit User</h1>
	</div>
	<div class="column">
			<a href="{{route('users.index')}}" class="button is-primary "><i class="fa fa-chevron-left m-r-10"></i>Back to Users</a>

	</div>
</div>

<form action="{{route('users.update',['id' => $user->id ] )}}" class="column is-half m-l-30" method="post" role="form">
                     {{method_field('PUT')}}
                     {{csrf_field()}}
      <div class="columns">
    <div class="column">
               
                 <div class="field">
                     <label for="name" class="label">Name</label> 
                     <p class="control">
                        <input class = "input" type="text" name="name" id="name" value="{{$user->name}} " required />
                     </p>
                     

                 </div>
                 <div class="field">
                     <label for="email" class="label">Email Address</label> 
                     <p class="control">
                        <input class = "input" type="text" name="email" id="email" value="{{$user->email}} " required />
                     </p>

                 </div>
                        <div class="field">
                         <label for="password" class="label">Password</label> 
                         
                             
                                <div class="field">
                                    <b-field>
                                <b-radio v-model="password_options" name="password_options"  native-value="keep"> Do Not Change Password  </b-radio>
                                </div>
                                <div class="field">
                                <b-radio v-model="password_options" name="password_options" native-value="auto"  > Auto-Generate New Password  </b-radio>
                                </div>
                                <div class="field">
                                <b-radio v-model="password_options" name="password_options" native-value="manual"> Manually Set New Password   </b-radio>
                                </b-field>
                                <p class="control">
                            <input class = "input" type="password" name="password" id="password"  v-if="password_options == 'manual'" placeholder="Manually add a Password" />

                                </p>
                                </div>
                            </div>

    
        <div class="column">

                                                <div class="field">
          <label for="roles" class="label">Roles:</label>
          <input type="hidden" name="roles" :value="rolesSelected" />

          
            @foreach ($roles as $role)
              <div class="field">
                <b-checkbox v-model="rolesSelected" :native-value="{{$role->id}}">{{$role->display_name}}</b-checkbox>
              </div>
            @endforeach
          
                                  </div>
                              </div>
    
                 <button class="button is-primary is-outlined is-fullwidth m-t-30">Edit User</button>
                 </form>
 					

@endsection

@section('scripts')
<script>

	var app = new Vue({
		el:'#app',
		data: {
			password_options: 'keep',
            rolesSelected: {!! $user->roles->pluck('id') !!}
		}
	});
</script>
@endsection