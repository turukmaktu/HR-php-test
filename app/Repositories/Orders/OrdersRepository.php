<?php
namespace App\Repositories\Orders;


use App\Order;

/**
 * Class OrdersRepository
 * Репозиторий для работы с заказами
 * @package App\Repositories\Orders
 */
class OrdersRepository
{
    /**
     * Массив для получения табов на странице списков и получения допустисых типов в урле фильтра по типу
     * @param bool $active
     * @param int $limit
     * @return array[]
     */
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

    /**
     * статусы заказов
     * @return string[]
     */
    public static function getStatuses(){

        return[
            0 => 'новый',
            10 => 'подтвержден',
            20 => 'завершен'
        ];
    }

    /*
     * получение заказов по активному табу
     */
    public function getOrdersByAcrive(array $active){

        $orders = Order::with( ['partner','products'])
            ->orderBy('delivery_dt',$active['ORDER_DELIVERY'])
            ->where('status', $active['STATUS'])
            ->take($active['LIMIT'])->get();

        return $orders;

    }
}