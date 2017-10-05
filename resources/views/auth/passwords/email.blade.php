@extends('layouts.app')

@section('content')
 @if (session('status'))
                        <div class="notification is-success">
                            {{ session('status') }}
                        </div>
                    @endif
 <div class="columns">
     <div class="column is-one-third is-offset-one-third m-t-100">
         <div class="card">
             <div class="card-content">
                 <h1 class="title">Forgot Password ? </h1>
                   


                 <form action="{{ route('password.email') }}" method="post" role="form">
                     {{csrf_field()}}
                 
                 <div class="field">
                     <label for="email" class="label">Email Address</label> 
                     <p class="control">
                        <input class = "input {{ $errors->has('email') ? ' is-danger' : '' }}" type="text" name="email" id="email" placeholder="name@example.com" value="{{old('email')}}" />
                     </p>
                     @if($errors->has('email'))
                     <p class="help is-danger">{{$errors->first('email')}}</p>
                     @endif

                 </div>

                 <button class="button is-primary is-outlined is-fullwidth m-t-30">Send Me Password Reset Link</button>
                 </form>
             </div>
         </div>
         <!-- end of card content -->
     </div>
 </div>

@endsection
