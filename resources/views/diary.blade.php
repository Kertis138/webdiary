@extends('layouts.diary_full')

@section('content-box')


<div class="row" id="content-title">
    Записи
</div>


@auth
    @if($diary_user->login == Auth::user()->login)
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
    @endif
@endauth

<div id="twits_wrapper">
    @include("twitlist", ["twits"=>$diary_user->getTwits()])
</div>

@endsection
