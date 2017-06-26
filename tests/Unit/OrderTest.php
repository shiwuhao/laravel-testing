<?php
/**
 * Created by PhpStorm.
 * User: shiwuhao
 * Date: 2017/6/26
 * Time: 上午8:20
 */

namespace Tests\Unit;
use App\Order;
use App\Product;


/**
 * Class OrderTest
 * @package Tests\Unit
 */
class OrderTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @test
     */
    public function an_order_consists_products()
    {
        $order = new Order;
        $product = new Product('iWatch', 3000);
        $productTwo = new Product('MDR-1000X', 2000);

        $order->add($product);
        $order->add($productTwo);

        //$this->assertEquals(2, count($order->products()));

        $this->assertCount(2, $order->products());
    }

    /**
     * @test
     */
    public function we_can_get_total_cost_from_all_products_of_an_orders()
    {
        $order = new Order;
        $product = new Product('iWatch', 3000);
        $productTwo = new Product('MDR-1000X', 2000);

        $order->add($product);
        $order->add($productTwo);

        $this->assertEquals(5000, $order->total());
    }
}
