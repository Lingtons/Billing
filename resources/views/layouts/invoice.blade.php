 <!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ config('app.name', 'GWU ') }}</title>

<em><span><script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script></span></em>
<em><span style="font-size:small;"><script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.debug.js"></script></span></em>
<em><span style="font-size:small;"><script src="{{ asset('js/split_text_to_size.js') }}"></script></span></em>

<em><span style="font-size:small;"><script src="{{ asset('js/from_html.js') }}"></script></span></em>
<em><span style="font-size:small;"><script src="{{ asset('js/standard_fonts_metrics.js') }}"></script></span></em>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('styles')
</head>
<body>
  
    <div  id="app">
        @include('_includes.nav.main')

<div class="columns is-fullheight p-l-10 p-t-10">
    
<div class="column is-main-content m-r-15" >
    @yield('content')
  </div>

</div>
 
    </div>
   <!-- Scripts -->
     

</body>
@yield('scripts')
</html>
