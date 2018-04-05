<div class="row">
    <div class="container twitblock">

        <div class="dropdown" id="{{$twit->id}}">
          <button type="button" id="twit_note_dd" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-angle-down"></i>
          </button>
          <div class="dropdown-menu" aria-labelledby="twit_note_dd">

            @if($diary_user->login == Auth::user()->login)
                <a class="dropdown-item delete-twit" href="#">
                    <i class="fas fa-trash-alt" style="color:red;"></i>
                    Удалить
                </a>
            @endif
          </div>
        </div>                        


        <div class="row">
            <div class="twit_photo"></div>
            <div class="twit_content">
                <div class="twittitle_name">
                    {{$diary_user->name}}
                    <span>{{'@'.$diary_user->login}}</span>
                    <span>{{date_format($diary_user->created_at,"d.m.Yг.")}}</span>
                </div>
                <div class="">{{$twit->twit}}</div>
            </div>
        </div>
    </div>
</div>