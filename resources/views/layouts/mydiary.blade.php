@extends('layouts.app')

@section('content')

<div class="contaner-fluid" id="userbg">
</div>

<div class="contaner-fluid" id="user-diary-status">

<div class="container h-100">
  <div class="row h-100">
    <div class="col-sm-3">
    </div>
    <div class="col-sm-9">
        
        <div class="container h-100">
            <div class="row h-100">
                <ul class="nav">
                  <li class="nav-item">
                    <a class="nav-link active" href="#">
                        <span class="t1">Записи</span>
                        <span class="t2">274</span>
                        <div class="t3"></div>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">
                        <span class="t1">Читатели</span>
                        <span class="t2">4534</span>
                        <div class="t3"></div>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">
                        <span class="t1">Читаемые</span>
                        <span class="t2">0</span>
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
        </div>

    </div>
  </div>
</div>


</div>


<div class="container">
  <div class="row">
    <div class="col-sm-3" id="left-user-info">
        <div id="userlogo"></div>
        <a href="#" id="userlink">Тони старк</a>
        <span id="userlink_after">@tonistark</span>

        <div id="info-box">
            <div>
                <i class="fas fa-map-marker"></i>
                Los Angeles, CA
            </div>
            <div>
                <a href="#">
                    <i class="fas fa-link"></i>
                    http://tonistark.com/
                </a>
            </div>
            <div>
            <i class="far fa-calendar-alt"></i>
            Дата регистрации: 1 января 1г.</div>
        </div>

    </div>
    <div class="col-sm-6">
        <div class="container" id="content-box">
            <div class="row" id="content-title">
                Записи
            </div>
            <div class="row" id="add-notes">
                <div id="add_notes_photo">
                </div>
                <div class="form-group col-10">
                    <textarea class="form-control col-12" id="addnote_textarea" rows="1" placeholder="Что нового?"></textarea>
                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn" id="push_note">Опубликовать</button>
                    </div>
                </div>
            </div>
            
            @foreach($twits as $twit)
                <div class="row" id="notes">
                    <div class="container twitblock">
            
                        <div class="dropdown">
                          <button type="button" id="twit_note_dd" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-angle-down"></i>
                          </button>
                          <div class="dropdown-menu" aria-labelledby="twit_note_dd">
                            <a class="dropdown-item" href="#">Скопировать ссылку на запись</a>
                            <a class="dropdown-item" href="#">Поделиться</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Редактировать</a>
                            <a class="dropdown-item" href="#">Удалить</a>
                          </div>
                        </div>                        


                        <div class="row">
                            <div class="twit_photo"></div>
                            <div class="twit_content">
                                <div class="twittitle_name">
                                    Тони Cтарк
                                    <span>@tonistark</span>
                                    <span>. 1ч</span>
                                </div>
                                <div class="">{{$twit->twit}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            
        </div>
    </div>
    <div class="col-sm-3">
    </div>
  </div>
</div>

@endsection
