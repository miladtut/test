<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Tax;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index(){
        $products = Product::all();
        return view('pages.products',['products'=>$products]);
    }
    public function product($id){
        $p = Product::find($id);
        $taxs = Tax::all();
        return view('components.product',['p'=>$p,'taxs'=>$taxs]);
    }
    public function proccess(Request $request){
        $res = [];
        if ($request->product_id){
            if(is_array($request->product_id)){
                foreach ($request->product_id as $id){
                    $prod = Product::find($id);
                    $tax = 'tax'.$id;
                    if ($request->$tax){
                        $value = 0;
                        if (is_array($request->$tax)){
                            foreach ($request->$tax as $t){
                                $value += $t;
                            }
                            $tx = $prod->price * $value;
                            array_push($res,[
                                'id'=>$prod->id,
                                'product_name'=>$prod->name,
                                'product_price'=>$prod->price,
                                'sum_of_taxs'=>($value * 100) .'%',
                                'product_price_after_tax'=>$prod->price-($tx),
                            ]);
                        }

                    }
                }
            }
        }
        $res = collect($res);
        return view('components.proccess',compact('res'));
    }
}
