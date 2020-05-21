@isset($menu)
    <ul class="nav nav-pills">
        @foreach($menu as $elMenu)
        <li role="presentation" class="{{$elMenu['CLASS']}}">
            <a href="{{$elMenu['URL']}}">{{$elMenu['NAME']}}</a>
        </li>
        @endforeach
    </ul>
@endisset