@extends('layouts.master')

@section('title', $title)

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br />
    @endif
    <form method="post" action="{{ route('orders.update', $order->id) }}">

        <input type="hidden" name="previos_url" value="{{url()->previous()}}">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="client_email">email клиента</label>
            <input type="email" class="form-control @error('client_email') is-invalid @enderror" name="client_email"  value="{{$order->client_email}}"/>
        </div>

        <div class="form-group">
            <label for="partner">партнер</label>
            <select class="form-control" name="partner">
                @foreach($partners as $partner)
                    <option value="{{$partner->id}}" {{$partner->id === $order->partner_id ? 'selected' : ''}}>{{$partner->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="partner">статус</label>
            <select class="form-control" name="status">
                @foreach($statuses as $key => $status)
                    <option value="{{$key}}" {{$key === $order->status ? 'selected' : ''}}>{{$status}}</option>
                @endforeach
            </select>
        </div>

        <table class="table">
            <tr>
                <th>Наименование</th>
                <th>Колличество</th>
            </tr>
            @foreach($order->produtBasket as $product)
                <tr>
                    <td>{{$product->parent->name}}</td>
                    <td>{{$product->quantity}}</td>
                </tr>
            @endforeach
            <tr>
                <th>Итого:</th>
                <th>{{$order->produtBasket->sum('price')}}</th>
            </tr>
        </table>

        <button type="submit" class="btn btn-success">Сохранить</button>
    </form>
@stop
