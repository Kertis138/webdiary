<!DOCTYPE html>
<html lang=lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @section('styles')
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    @show
    @section('scripts')
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
        <script defer src="{{ mix('js/app.js') }}"></script>
    @show
    <title>@yield('title')</title>
</head>
<body>
    <div id="app">
    </div>
    @include('include.header')
    <div class="container">
      <div class="row">
        <div class="col-sm-2 diary-block">
          @include('include.leftbar')
        </div>
        <div class="col-sm-7">
          @yield('content')
        </div>
        <div class="col-sm-3 diary-block">
          @include('include.rightbar')
        </div>
      </div>
    </div>

<script>
    window.Laravel = <?php echo json_encode([
        'csrfToken' => csrf_token(),
    ]); ?>
</script>
</body>
</html>