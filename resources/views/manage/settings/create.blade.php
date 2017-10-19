@extends('layouts.manage')

@section('content')
 
<div class="columns m-t-10">
	<div class="column">
		<h1 class="title">Create User</h1>
	</div>
	<div class="column">
			<a href="{{route('users.index')}}" class="button is-primary "><i class="fa fa-chevron-left m-r-10"></i>Back to Users</a>

	</div>
</div>

<form action="{{route('users.store')}}" class="column is-half is-offset-one-quarter" method="post" role="form">
                     {{csrf_field()}}
                 
                 <div class="field">
                     <label for="name" class="label">Name</label> 
                     <p class="control">
                        <input class = "input" type="text" name="name" id="name" placeholder="Lingtons Chima" required />
                     </p>
                     

                 </div>
                 <div class="field">
                     <label for="email" class="label">Email Address</label> 
                     <p class="control">
                        <input class = "input" type="text" name="email" id="email" placeholder="name@example.com" required />
                     </p>
                     

                 </div>
                        <div class="field">
                         <label for="password" class="label">Password</label> 
                         <p class="control">
                            <input class = "input" type="password" name="password" id="password"  v-if="!auto_password" placeholder="Manually add a Password" />
                         </p>
                        
                        </div>
                    <b-checkbox name="auto_generate" :checked="true" v-model="auto_password" class = "m-t-20">Auto Generate Password </b-checkbox>    
                 
                 <button class="button is-primary is-outlined is-fullwidth m-t-30">Add User</button>
                 </form>
 					

@endsection

@section('scripts')
<script>

	var app = new Vue({
		el:'#app',
		data: {
			auto_password: true
		}
	});
</script>
@endsection