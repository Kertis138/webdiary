<div class="row twitroot">
    <div class="container twitblock">
        <div class="row">
            <div class="col-2">
                <div class="twit_photo"></div>
            </div>
            <div class="col-10 twit_content">

                <div class="dropdown" id="{{$twit->id}}">
                  <button type="button" id="twit_note_dd" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-angle-down"></i>
                  </button>
                  <div class="dropdown-menu" aria-labelledby="twit_note_dd">

                    @auth
                        @if($diary_user->login == Auth::user()->login)
                            <a class="dropdown-item delete-twit" href="#">
                                <i class="fas fa-trash-alt" style="color:red;"></i>
                                Удалить
                            </a>
                        @endif
                    @endauth
                  </div>
                </div>    

                <div class="row twittitle_name">
                    {{$diary_user->name}}
                    <span>{{'@'.$diary_user->login}}</span>
                    <span>{{date_format($diary_user->created_at,"d.m.Yг.")}}</span>
                </div>
                <div class="row twittext">
                    <div class="">{!! $twit->twit !!}</div>
                </div>
                <div class="row twitpanel d-flex justify-content-start">
                    <div class="likediv {{$twit->hasLike(Auth::user())?'likey':'liken'}}" id="{{$twit->id}}"><span>{{$twit->likes()}}</span><i class="fas fa-heartbeat"></i></div>
                </div>
            </div>
        </div>
    </div>
</div>