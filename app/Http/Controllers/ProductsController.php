<?php

namespace App\Http\Controllers;

use App\Contracts\MenuContract;
use App\Partner;
use App\Product;
use App\Repositories\Orders\OrdersRepository;
use App\Order;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index(){

        $products = Product::with('vendor')
            ->orderBy('name', 'asc')
            ->paginate(25);

        return view('products.list')
            ->with('title', "список продуктов")
            ->with('products',$products)
            ->with('menu', MenuContract::getMenu(route('products')));
    }

    public function update(Request $request, $id){

        $product = Product::find($id);
        $product->price = $request->get('price');
        $product->save();

        return [
            'id' => $id,
            'price' => $product->price
        ];
    }
}
