<?php
/**
 * Created by PhpStorm.
 * User: shiwuhao
 * Date: 2017/5/10
 * Time: 上午7:59
 */

namespace Tests\Unit;

use App\Product;

/**
 * Class ProductTest
 * @package Tests\Unit
 */
class ProductTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @test
     */
    public function a_product_has_a_name()
    {
        $product = new Product('iPhone 7', 6000);

        $this->assertEquals('iPhone 7', $product->name());
    }

    /**
     * @test
     */
    public function a_product_has_a_price()
    {
        $product = new Product('MacBook', 10000);

        $this->assertEquals(10000, $product->price());
    }

    /**
     * @test
     */
    public function a_product_can_be_sold_with_discount()
    {
        $product = new Product('Macbook', 10000);

        $product->setDiscount(8);

        $this->assertEquals(8000, $product->price());
    }
}