@extends('layouts.diary_full')

@section('content-box')


<div class="row" id="content-title">
    Нравится
</div>


<div id="twits_wrapper">
    @include("twitlist", ["twits"=>$twits])
</div>


@endsection
