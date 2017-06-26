<?php
/**
 * Created by PhpStorm.
 * User: shiwuhao
 * Date: 2017/5/10
 * Time: 上午8:03
 */

namespace App;


class Order
{
    protected $products = [];


    public function add(Product $product)
    {
        $this->products[]  = $product;
    }

    public function products()
    {
        return $this->products;
    }

    public function total()
    {
        $total = 0;

        foreach ($this->products as $product) {
            $total += $product->price();
        }

        return $total;
    }
}