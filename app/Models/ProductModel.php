<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'tb_product';
    protected $useTimestamps = true;

    public function search($keyword)
    {
        return $this->table('tb_product')->like('product_id', $keyword);
    }

}