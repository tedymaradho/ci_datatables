<?php

namespace App\Controllers;

use App\Libraries\DataTable;

class Home extends BaseController
{
    public function index()
    {
        return view('v_product');
    }

    public function getProducts()
    {
        $dataTable = new DataTable();
        $response = $dataTable->process('ProductModel', [
            [
                'name' => 'product_id'
            ],
            [
                'name' => 'product_name'
            ],
            [
                'name' => 'price'
            ],
        ]);

        return json_encode($response);
    }
}