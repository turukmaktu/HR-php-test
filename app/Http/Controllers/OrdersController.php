<?php

namespace App\Http\Controllers;

use App\Contracts\MenuContract;
use App\Partner;
use App\Repositories\Orders\OrdersRepository;
use App\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index($sort = false ,OrdersRepository $ordersRepository){

        if($sort === false){
            $sort = head($ordersRepository::getTabs())['CODE'];
        }

        $tabs = $ordersRepository::getTabs($sort);

        $active = collect($tabs)->firstWhere('ACTIVE',true);

        if(!isset($active)){
            throw new \Exception('нет активного таба');
        }

        $orders = $ordersRepository->getOrdersByAcrive($active);

        return view('order.list')
            ->with('tabs',$tabs)
            ->with('title', "список заказов - {$active['NAME']}")
            ->with('orders',$orders)
            ->with('menu', MenuContract::getMenu(route('orders')));
    }

    public function edit($id){
        $order = Order::where('id',$id)->firstOrFail();

        $statuses = OrdersRepository::getStatuses();

        return view('order.edit')
            ->with('order', $order)
            ->with('title', "Редактирование заказа - {$order->id}")
            ->with('statuses', $statuses)
            ->with('partners', Partner::all())
            ->with('breadcrumbs',[
                [
                    'NAME' => 'Список Заказов',
                    'URL' => route('orders')
                ],
                "Редактирование заказа - {$order->id}"
            ])
            ->with('menu', MenuContract::getMenu(route('orders')));
    }

    public function update(Request $request, $id){

        $request->validate([
            'client_email'=>'required',
            'partner' => 'required',
            'status' => 'required'
        ]);

        $order = Order::find($id);

        $order->client_email = $request->get('client_email');
        $order->partner_id = $request->get('partner');
        $order->status = $request->get('status');

        $order->save();

        if($request->get('previos_url')){
            return redirect($request->get('previos_url'))->with('success', "Заказ №{$order->id} сохранен!");
        }

        return redirect(action('OrdersController@index'))->with('success', "Заказ №{$order->id} сохранен!");

    }
}
