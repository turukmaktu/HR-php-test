<?php
namespace App\Contracts;

/**
 * Вспомогательный класс для отрисовки меню
 * Class MenuContract
 * @package App\Contracts]
 */
class MenuContract
{
    private static function getDefaultMenu(){
        return [
            [
                'NAME' => 'Погода',
                'URL' => route('weather'),
                'CLASS' => ''
            ],
            [
                'NAME' => 'Заказы',
                'URL' => route('orders'),
                'CLASS' => '',
            ],
            [
                'NAME' => 'Продукты',
                'URL' => route('products'),
                'CLASS' => ''
            ]
        ];
    }

    /**
     * получить пункты меню с активным урлом. используется в передаче параметров во view
     * @param $url
     * @return \Illuminate\Support\Collection
     */
    public static function getMenu($url){

        return collect(self::getDefaultMenu())->map(function($elMenu) use ($url){
            if($elMenu['URL'] === $url){
                $elMenu['CLASS'] = 'active';
            }
            return $elMenu;
        });

    }


}