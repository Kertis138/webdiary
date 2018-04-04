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
    </div>
    <div class="col-sm-6">
    </div>
    <div class="col-sm-3">
    </div>
  </div>
</div>

@endsection
