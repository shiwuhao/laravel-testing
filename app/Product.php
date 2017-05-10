<?php
/**
 * Created by PhpStorm.
 * User: shiwuhao
 * Date: 2017/5/10
 * Time: 上午8:03
 */

namespace App;


class Product
{
    protected $name;

    protected $price;

    public function __construct($name, $price = 0)
    {
        $this->name = $name;
        $this->price = $price;
    }

    public function name()
    {
        return $this->name;
    }

    public function price()
    {
        return $this->price;
    }
}