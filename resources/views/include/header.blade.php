<div class="container-fluid bg-light" id="top-navbar">
<div class="container">
  <nav class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand" href="{{ route('home') }}">Онлайн дневник</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    	<span class="navbar-toggler-icon"></span>
  	</button>
  	<div class="container">
	  	<div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
			<ul class="nav">
			  <li class="nav-item">
			    <a class="nav-link active" href="#">Найти дневник</a>
			  </li>				
			  <li class="nav-item">
			    <a class="nav-link active" href="{{ route('home') }}">Мой дневник</a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link" href="{{ route('profile') }}">Профиль</a>
			  </li>
			</ul>
		</div>
		<div class="d-flex justify-content-end">
			@if(Auth::guest())
				<ul class="nav">
				  <li class="nav-item">
				    <a class="nav-link active" href="{{ route('login') }}">Вход</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link" href="{{ route('register') }}">Регистрация</a>
				  </li>
				</ul>
			@else
				<ul class="nav">
				  <li class="nav-item">
				    <a class="nav-link" href="{{ route('profile') }}">{{ Auth::user()->name }}</a>
				  </li>
				  <li class="nav-item">
					<a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Выход</a>
					<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
				  </li>
				</ul>
			@endif
		</div>
	</div>
  </nav>
</div>
</div>