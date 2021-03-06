<?php

namespace App\Controllers;

use App\Core\Request;


use App\Models\Products;

class ProductController
{
    private $products;

    /**
     * ProductController constructor.
     */
    public function __construct(){
        $this->products = new Products();
    }

    /**
     * @return mixed
     */
    public function viewProducts()
    {
        if (Request::is('GET')) {
            $products = $this->products->viewProducts();

            return view('viewProducts',['products' => $products]);
        }
    }

    /**
     * @return mixed
     */
    public function viewProductsRegion()
    {
        if (Request::is('GET')) {

            $products = $this->products->viewProductsRegion();

            return view('viewProductsRegion',['products' => $products]);
        }
    }

    /**
     * @return mixed
     */
    public function createProductView()
    {
        if (Request::is('GET')) {
            return view('createViewProducts');
        }
    }

    /**
     * @return mixed
     */
    public function createProducts()
    {

        if (Request::is('POST')) {
            $this->products->code = Request::get('code');
            $this->products->name = Request::get('name');
            $this->products->price = Request::get('price');
            $this->products->region_id = Request::get('region');

            if ($this->products->createProducts()) {
                return view('createProductsSuccess');
            } else {
                return view('createViewProducts',  [
                    'errors' => 'Product have not created'
                ]);
            }
        }
    }

    /**
     * @return mixed
     */
    public function updateProducts()
    {
        $this->products->id  = Request::get('productsID');
        $this->products->code = Request::get('code');
        $this->products->name = Request::get('name');
        $this->products->price = Request::get('price');
        $this->products->region_id = Request::get('region');

        if (Request::is('POST')) {
            if ($this->products->updateProducts()) {
                return view('viewProducts',['success' => 'Product updated successfully']);
            } else {
                return view('viewProducts',  [
                    'errors' => 'Product have not updated.'
                ]);
            }

        }
    }

    /**
     * @return mixed
     */
    public function deleteProducts()
    {
        if (Request::is('POST')) {

            $this->products->id = Request::get('productId');

            if ($this->products->deleteProducts()) {
                $products = $this->products->viewProducts();

                return view('viewProducts',[
                    'errors' => 'Product have deleted.', 'products' => $products
                ]);
            } else {
                return view('viewUsers',  [
                    'errors' => 'Product have not deleted.'
                ]);
            }
        }
    }
}
