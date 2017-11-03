 <!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ config('app.name', 'GWU ') }}</title>
  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <link href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/buttons/1.4.0/css/buttons.dataTables.min.css" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('styles')
</head>
<body>
  
    <div  id="app">
        @include('_includes.nav.main')
        @include('_includes.nav.manage')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>


<script src="https://code.jquery.com/jquery-2.1.1.min.js" ></script>
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js" ></script>
<script src="https://cdn.datatables.net/buttons/1.4.0/js/dataTables.buttons.min.js" ></script>
<script src="https://cdn.datatables.net/buttons/1.4.0/js/buttons.flash.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" ></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js" ></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js" ></script>
<script src="https://cdn.datatables.net/buttons/1.4.0/js/buttons.html5.min.js" ></script>
<script src="https://cdn.datatables.net/buttons/1.4.0/js/buttons.print.min.js" ></script>
<script src="{{asset('js/dt_init.js')}}"></script> 
</body>
@yield('scripts')
</html>
