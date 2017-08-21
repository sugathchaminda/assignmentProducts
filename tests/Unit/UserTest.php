<?php

namespace Tests\Unit;

use App\Models\Products;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{

    /**
     * @test
     */
    public function it_should_create_products()
    {
        $products = new Products();
        $products->code = 'test';
        $products->name = 'test';
        $products->price = 100;
        $products->region_id = 1;

        $products->createProducts();

        $this->assertEquals(true, $products->createProducts());
    }

    /**
     * @test
     */
    public function it_should_delete_products()
    {
        $products = new Products();
        $products->id = 'test';
        $products->name = 'test';
        $products->price = 100;
        $products->region_id = 1;

        $products->createProducts();

        $this->assertEquals(true, $products->deleteProducts());
    }

}
