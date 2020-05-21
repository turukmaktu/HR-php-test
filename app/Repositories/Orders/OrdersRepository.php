<?php
namespace App\Repositories\Orders;


use App\Order;

class OrdersRepository
{
    public static function getTabs($active = false, $limit = 50){

        return[
            'past_due' => [
                'CODE' => 'past_due',
                'NAME' => 'Просроченные',
                'STATUS' => 10,
                'ACTIVE' => $active == 'past_due' ? true : false,
                'LIMIT' => $limit,
                'ORDER_DELIVERY' => 'desk'
            ],
            'current' => [
                'CODE' => 'current',
                'NAME' => 'Текущие',
                'STATUS' => 10,
                'ACTIVE' => $active == 'current' ? true : false,
                'LIMIT' => $limit,
                'ORDER_DELIVERY' => 'ask'
            ],
            'new' => [
                'CODE' => 'new',
                'NAME' => 'Новые',
                'STATUS' => 0,
                'ACTIVE' => $active == 'new' ? true : false,
                'LIMIT' => $limit,
                'ORDER_DELIVERY' => 'ask'
            ],
            'completed' => [
                'CODE' => 'completed',
                'NAME' => 'Выполненные',
                'STATUS' => 20,
                'ACTIVE' => $active == 'completed' ? true : false,
                'LIMIT' => $limit,
                'ORDER_DELIVERY' => 'desk'
            ]
        ];

    }

    public static function getStatuses(){

        return[
            0 => 'новый',
            10 => 'подтвержден',
            20 => 'завершен'
        ];
    }

    public function getOrdersByAcrive(array $active){

        $orders = Order::with( ['partner','products'])
            ->orderBy('delivery_dt',$active['ORDER_DELIVERY'])
            ->where('status', $active['STATUS'])
            ->take($active['LIMIT'])->get();

        return $orders;

    }
}