@extends('layouts.master')
@section('title', 'Температура')
@section('content')
    @if($temperature != false)
        <div class="col-xs-12">
            <h1>Температура В Брянске - {{$temperature}} C</h1>
        </div>
    @endif
@stop