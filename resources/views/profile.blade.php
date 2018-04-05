@extends('layouts.diary_full')

@section('content-box')


<div class="container">
   	

<form action="{{route('profile_save')}}" method="POST" enctype="multipart/form-data">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<div class="form-group row">
	  <label for="example-text-input" class="col-3 col-form-label">Ваше имя</label>
	  <div class="col-9">
	    <input class="form-control" type="text" value="{{$diary_user->name}}" id="example-text-input" name="name">
	  </div>
	</div>

	<div class="form-group row">  
		<label for="example-text-input" class="col-3 col-form-label">Местоположение</label>
	  <div class="col-9">
	    <input class="form-control" type="text" value="{{$diary_user->location}}" id="example-text-input" name="location">
	  </div>
	</div>

	<div class="form-group row">
	  <label for="example-text-input" class="col-3 col-form-label">Ссылка</label>
	  <div class="col-9">
	    <input class="form-control" type="text" value="{{$diary_user->link}}" id="example-text-input" name="link">
	  </div>
	</div>

	<div class="form-group row">
	  	<label for="example-text-input" class="col-3 col-form-label">Логотип</label>
		<span class="btn btn-default btn-file">
		    <input type="file" name="logofile" accept="image/*">
		</span>
	</div>


	<div class="form-group row">
		<label for="example-text-input" class="col-3 col-form-label">Фон дневника</label>
		<span class="btn btn-default btn-file">
		    <input type="file" name="bgfile" accept="image/*">
		</span>
	</div>

    <div class="d-flex justify-content-end">
        <button type="submit" class="btn" id="save_profile">Сохранить</button>
    </div>
</form>


</div>

@endsection
