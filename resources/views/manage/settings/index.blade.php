@extends('layouts.manage')

@section('content')
 
<div class="columns m-t-10">
	<div class="column">
		<h1 class="title">Variable Settings</h1>
	</div>
	<div class="column">
			
	</div>
</div>

<form action="{{route('setting.update',['id' => 1 ] )}}" class="column is-half m-l-30" method="post" role="form">
                     {{method_field('PUT')}}
                     {{csrf_field()}}
      <div class="columns">
    <div class="column">
               
                 <div class="field">
                     <label for="gas_rate" class="label">Gas Rate</label> 
                     <p class="control">
                     <input class = "input" type="text" name="gas_rate" id="gas_rate" 
                     value="{{$setting->gas_rate}} " required />
                     </p>
                     

                 </div>
                 <div class="field">
                     <label for="multiplier" class="label">Multiplier</label> 
                     <p class="control">
                        <input class = "input" type="text" name="multiplier" id="multiplier" value="{{$setting->multiplier}} " required />
                     </p>

                 </div>
                 
                                  <div class="field">
                     <label for="statement_date" class="label">Statement Date</label> 
                     <p class="control">
                  <input class = "input" type="date" name="statement_date" id="statement_date" 
                  value="{!!html_entity_decode($setting->statement_date)!!}" required />
                     </p>

                 </div>

                 <button class="button is-primary is-outlined is-fullwidth m-t-30">Update Variables</button>
                 </form>

 				


@endsection
