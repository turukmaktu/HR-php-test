@extends('layouts.master')
@section('title', $title)
@section('content')
    <ul class="nav nav-tabs">
        @foreach($tabs as $tab)
            <li role="presentation" class="{{$tab['ACTIVE'] ? 'active' : ''}}">
                <a href="{{route('orders',['sort' => $tab['CODE']])}}">{{$tab['NAME']}}</a>
            </li>
        @endforeach
    </ul>



    @if(session()->get('success'))
        <div class="col-sm-12">
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        </div>
    @endif


    @if(count($orders) > 0)
        <div class="col-xs-12">
            <table class="table">
                <tr>
                    <th>ID</th>
                    <th>Пратнер</th>
                    <th>стоимость заказа</th>
                    <th>наименование состав заказа</th>
                    <th>статус заказа</th>
                </tr>
                @foreach($orders as $order)
                    <tr>
                        <td>
                            <a href="{{route('orders.edit',$order)}}">{{$order->id}}</a>
                        </td>
                        <td>{{$order->partner->name}}</td>
                        <td>{{$order->products->sum('price')}}</td>
                        <td>{{implode(', ',$order->products->pluck('name')->all())}}</td>
                        <td>{{App\Repositories\Orders\OrdersRepository::getStatuses()[$order->status]}}</td>
                    </tr>
                @endforeach

            </table>
        </div>

    @endif
@stop

