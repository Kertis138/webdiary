<div>
	<h6>Дневник: {{Auth::user()->name}}</h6>
	<h6>Количество записей: {{count($twits)}}</h6>
	<h6>Дата регистрации: {{Auth::user()->created_at}}</h6>
</div>