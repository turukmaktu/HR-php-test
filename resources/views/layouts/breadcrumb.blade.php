@isset($breadcrumbs)
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            @foreach($breadcrumbs as $breadcrumb)
                @if(is_array($breadcrumb))
                    <li class="breadcrumb-item"><a href="{{$breadcrumb['URL']}}">{{$breadcrumb['NAME']}}</a></li>
                @else
                    <li class="breadcrumb-item active" aria-current="page">{{$breadcrumb}}</li>
                @endif
            @endforeach
        </ol>
    </nav>
@endisset