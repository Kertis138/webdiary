@extends('mydiary.layout')

@section('mydiary-wrapper')
	@parent


@foreach ($twits as $twit)

	{{--
		$twit->twit
		$twit->name
		$twit->time
		$twit->likes
		$username
	--}}


    <div class="twit">
    	<div class="first container">
    		{{$twit->name}}
    	</div>

    	<div class="second container">
    		{{$twit->twit}}
    	</div>

    	<div class="third container">
    		{{$twit->likes}} likes
    	</div>
	</div>

@endforeach

@endsection
