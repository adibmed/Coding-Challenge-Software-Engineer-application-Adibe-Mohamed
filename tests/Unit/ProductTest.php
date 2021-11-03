<?php

namespace Tests\Unit;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductTest extends TestCase
{

    use RefreshDatabase;

    /**
     * create a product
     * 
     * @param array $override
     * @return Product
     */
    public function createProduct(array $override = []): Product
    {
        return Product::factory()->create($override);
    }

    /**
     * Create products
     *
     * @param  int  $amount
     * @return Collection
     */

    public function createProducts($amount = 1): Product
    {
        return Product::factory()->count($amount)->create();
    }

    /** @test */
    public function it_create_product()
    {
        $product = $this->createProduct();

        $this->assertDatabaseHas(Product::class, [
            'id' => $product->id,
            'name' => $product->name,
            'description' => $product->description,
            'price' => $product->price,
            'image' => $product->image,
        ]);
    }
}
