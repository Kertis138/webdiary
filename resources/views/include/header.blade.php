<!-- <nav class="navbar navbar-expand-lg navbar-light bg-light justify-content-between" id="top-navbar">
	<a class="navbar-brand" href="#">Search</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    	<span class="navbar-toggler-icon"></span>
  	</button>
  	<div class="collapse navbar-collapse " id="navbarSupportedContent">
		<ul class="nav">
		  <li class="nav-item">
		    <a class="nav-link active" href="#">Active</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" href="#">Link</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" href="#">Link</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link disabled" href="#">Disabled</a>
		  </li>
		</ul>
	</div>
</nav> -->

<div class="container-fluid bg-light" id="top-navbar">
<div class="container">
  <nav class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand" href="#">WebDiary</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    	<span class="navbar-toggler-icon"></span>
  	</button>
  	<div class="container">
	  	<div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
			<ul class="nav">
			  <li class="nav-item">
			    <a class="nav-link active" href="{{ url('mydiary') }}">Мой дневник</a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link" href="#">Профиль</a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link" href="#">О нас</a>
			  </li>
			</ul>
		</div>
		<div class="d-flex justify-content-end">
			@if(Auth::guest())
				<ul class="nav">
				  <li class="nav-item">
				    <a class="nav-link active" href="{{ url('login') }}">Вход</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link" href="{{ url('register') }}">Регистрация</a>
				  </li>
				</ul>
			@else
				<ul class="nav">
				  <li class="nav-item">
				    <a class="nav-link" href="{{ url('login') }}">{{ Auth::user()->name }}</a>
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