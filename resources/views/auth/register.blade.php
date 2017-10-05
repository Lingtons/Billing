@extends('layouts.app')

@section('content')
 <div class="columns">
     <div class="column is-one-third is-offset-one-third m-t-100">
         <div class="card">
             <div class="card-content">
                 <h1 class="title">Register</h1>
                 <form action="{{route('register')}}" method="post" role="form">
                     {{csrf_field()}}
                 
                 <div class="field">
                     <label for="name" class="label">Name</label> 
                     <p class="control">
                        <input class = "input {{ $errors->has('name') ? ' is-danger' : '' }}" type="text" name="name" id="name" placeholder="Lingtons Chima" value="{{old('name')}}" required />
                     </p>
                     @if($errors->has('name'))
                     <p class="help is-danger">{{$errors->first('name')}}</p>
                     @endif

                 </div>
                 <div class="field">
                     <label for="email" class="label">Email Address</label> 
                     <p class="control">
                        <input class = "input {{ $errors->has('email') ? ' is-danger' : '' }}" type="text" name="email" id="email" placeholder="name@example.com" value="{{old('email')}}" required />
                     </p>
                     @if($errors->has('email'))
                     <p class="help is-danger">{{$errors->first('email')}}</p>
                     @endif

                 </div>
                 <div class="columns">
                     <div class="column">
                        <div class="field">
                         <label for="password" class="label">Password</label> 
                         <p class="control">
                            <input class = "input {{ $errors->has('password') ? ' is-danger' : '' }}" type="password" name="password" id="password" required />
                         </p>
                         @if($errors->has('password'))
                         <p class="help is-danger">{{$errors->first('password')}}</p>
                         @endif
                        </div>
                    </div>
                     <div class="column">
                        <div class="field">
                     <label for="password-confirm" class="label">Confirm Password</label> 
                     <p class="control">
                        <input class = "input" type="password" name="password_confirmation" id="password-confirm" required />
                     </p>
                     
                     
                 </div>
                        
                 </div>
             </div>
    
                 <button class="button is-primary is-outlined is-fullwidth m-t-30">Register</button>
                 </form>
             </div>
         </div>
         <!-- end of card content -->
         
     </div>
 </div>

@endsection
