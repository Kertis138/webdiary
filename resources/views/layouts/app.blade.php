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
        <script defer src="{{ asset('js/app.js') }}"></script>
    @show
    <title>@yield('title')</title>
</head>
<body>

@if($errors->any())
<h4>{{$errors->first()}}</h4>
@endif

    <div id="app">

        @include('include.header')

        @yield('content')
    </div>
<script>
    window.Laravel = <?php echo json_encode([
        'csrfToken' => csrf_token(),
    ]); ?>
</script>
</body>
</html>