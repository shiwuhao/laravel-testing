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
    protected $order;
    protected $product;
    protected $productTwo;

    /**
     * @test
     */
    public function setUp()
    {
        parent::setUp(); // TODO: Change the autogenerated stub

        $this->order = new Order;
        $this->product = new Product('iWatch', 3000);
        $this->productTwo = new Product('MDR-1000X', 2000);
    }

    /**
     * @test
     */
    public function an_order_consists_products()
    {


        $this->order->add($this->product);
        $this->order->add($this->productTwo);

        //$this->assertEquals(2, count($this->>order->products()));
        $this->assertCount(2, $this->order->products());
    }

    /**
     * @test
     */
    public function we_can_get_total_cost_from_all_products_of_an_orders()
    {

        $this->order->add($this->product);
        $this->order->add($this->productTwo);

        $this->assertEquals(5000, $this->order->total());
    }
}
