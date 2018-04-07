@extends('layouts.diary_full')

@section('content-box')


<div class="row" id="content-title">
    Читатели
</div>


@foreach($follows_user as $fuser)
    <div class="row userlistroot">
        <div class="check">
            <i class="far fa-check-circle"></i>
        </div>
        <div class="container user_list_container">
            <a href="{{route("diary",$fuser->login)}}" class="user_list_link">
            <div class="row follows_row" >
                <div class="follows_photo" style="background-image: url({{$fuser->logo()}}) !important"></div>
                <div class="follows_userblock">
                    <div class="row twittitle_name">
                        {{$fuser->name}}
                        <span>{{'@'.$fuser->login}}</span>
                        <span>{{date_format($fuser->created_at,"d.m.Yг.")}}</span>
                    </div>
                    <div class="row user_data">
                        <span>{{$fuser->location}}</span>
                    </div>
                </div>
            </div>
            </a>
        </div>
    </div>

@endforeach


@endsection
