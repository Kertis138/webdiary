@foreach($twits as $twit)
    @include("twit", ["twit"=>$twit])
@endforeach