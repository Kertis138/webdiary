@extends('layouts.app')

@section('content')


@foreach ($twits as $twit)

	{{--
		$twit->twit
		$twit->name
		$twit->time
		$twit->likes
		$username
	--}}


    <div class="twit diary-block">
    	<div class="first container">
    		{{$twit->name}}
    	</div>

    	<div class="second container">
    		{{$twit->twit}}
    	</div>

    	<div class="third container">
            <span class="likes">
            {{$twit->likes}} 
            <i class="fas fa-heart"></i>
            </span>
    	</div>
	</div>

@endforeach

@endsection
