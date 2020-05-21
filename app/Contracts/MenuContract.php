<?php
namespace App\Contracts;

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

    public static function getMenu($url){

        return collect(self::getDefaultMenu())->map(function($elMenu) use ($url){
            if($elMenu['URL'] === $url){
                $elMenu['CLASS'] = 'active';
            }
            return $elMenu;
        });

    }


}