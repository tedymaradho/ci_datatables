<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductModel;

class Products extends BaseController
{
    protected $productModel;

    public function __construct()
    {
        $this->productModel = new ProductModel;
    }
    public function index()
    {
        $currentPage = $this->request->getVar('page_tb_product') ? $this->request->getVar('page_tb_product') : 1;
        $pageLimit = 10;

        $keyword = $this->request->getPost('keyword');
        if ($keyword) {
            $keySearch = $this->productModel->search($keyword);
        } else {
            $keySearch = $this->productModel;
        }

        $data = [
            'products' => $keySearch->paginate($pageLimit, 'tb_product'),
            'pager' => $this->productModel->pager,
            'currentPage' => $currentPage,
            'pageLimit' => $pageLimit,
        ];

        return view('v_product', $data);
    }
}