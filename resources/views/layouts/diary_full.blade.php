@extends('layouts.app')

@section('content')

<div class="contaner-fluid" id="userbg"></div>
<style>
    #userbg {
        background-image: url({{$diary_user->bg()}}) !important;
    }

    #userlogo, #add_notes_photo, .twit_photo {
        background-image: url({{$diary_user->logo()}}) !important;
    }    
</style>

<div class="contaner-fluid" id="user-diary-status">

<div class="container h-100">
  <div class="row h-100">
    <div class="col-sm-3">
    </div>
    <div class="col-sm-9">
        
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-10">
                    <ul class="nav">
                      <li class="nav-item">
                        <a class="nav-link active" href="#">
                            <span class="t1">Записи</span>
                            <span class="t2" id="twits_count">{{count($twits)}}</span>
                            <div class="t3"></div>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span class="t1">Читатели</span>
                            <span class="t2">{{count($follows)}}</span>
                            <div class="t3"></div>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span class="t1">Читаемые</span>
                            <span class="t2">{{count($subs)}}</span>
                            <div class="t3"></div>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span class="t1">Нравится</span>
                            <span class="t2">9893</span>
                            <div class="t3"></div>
                        </a>
                      </li>
                    </ul>
                </div>
                <div class="col-2">
                    @auth

                        @if(count($follows->where("follow_id",Auth::user()->id)) > 0 )
                             <a class="btn" id="notread_diary" href="{{route("notread_diary", $diary_user->login)}}">Отписаться</a>
                        @else
                            @if(Auth::user()->login != $diary_user->login)
                                <a class="btn" id="read_diary" href="{{route("read_diary", $diary_user->login)}}">Читать</a>
                            @endif
                        @endif



                    @endauth
                </div>
            </div>
        </div>

    </div>
  </div>
</div>

</div>


<div class="container">
  <div class="row">
    <div class="col-sm-3" id="left-user-info">
        <div id="userlogo"></div>
        <a href="{{route('profile')}}" id="userlink">{{$diary_user->name}}</a>
        <span id="userlink_after">{{'@'.$diary_user->login}}</span>

        <div id="info-box">
            <div>
                <i class="fas fa-map-marker"></i>
                {{$diary_user->location}}
            </div>
            <div>
                <a href="#">
                    <i class="fas fa-link"></i>
                    {{$diary_user->link}}
                </a>
            </div>
            <div>
            <i class="far fa-calendar-alt"></i>
            Дата регистрации: {{date_format($diary_user->created_at, "m.d.Yг.")}}</div>
        </div>

    </div>
    <div class="col col-sm-6">
        <div class="container" id="content-box">
            @yield('content-box')
        </div>
    </div>

    <div class="col col-sm-3">
        {{--<div class="container" id="right-box">
            @include('sidebar_elements.mysubs')
        </div>--}}
    </div>

  </div>
</div>

@endsection
