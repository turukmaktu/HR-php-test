@extends('layouts.master')

@section('title', $title)

@section('content')
    <div class="col-xs-12">
        {{ csrf_field() }}
        <table class="table">
            <tr>
                <th>ИД</th>
                <th>Наименование</th>
                <th>Поставщик</th>
                <th>Цена</th>
                <th></th>
            </tr>
            @foreach($products as $product)
            <tr>
                <td>{{$product->id}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->vendor->name}}</td>
                <td><input type="number" value="{{$product->price}}" id="{{$product->id}}"></td>
                <td><a class="btn btn-success save-product" data-id="{{$product->id}}">Сохранить</a></td>
            </tr>
            @endforeach
        </table>
    </div>

    @if($products->total() > $products->count())
        <div class="col-xs-12">
            <div class="row justify-content-center">
                <div class="card">
                    <div class="card-body">
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    @endif


@stop