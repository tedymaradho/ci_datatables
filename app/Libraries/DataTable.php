<?php
namespace App\Libraries;

use Config\Services;

class DataTable
{
    public function process($modelClass, $columns, $where = [])
    {
        helper('formatter');

        $modelClass = '\\App\\Models\\' . $modelClass;
        $model = new $modelClass;

        foreach ($columns as $column) {
            $fields[] = $column['name'];
        }

        $select = implode(', ', $fields);

        $model->select($select);

        if (empty($where) === false) {
            $model->where($where);
        }

        $request = Services::request();
        $get = $request->getGet();
        $getColumns = $get['columns'];

        foreach ($get['order'] as $order) {
            if ($getColumns[$order['column']]['orderable'] === 'true') {
                $model->orderBy($columns[$order['column']]['name'], strtoupper($order['dir']));
            }
        }

        $recordsTotal = $model->countAllResults(false);
        $match = $get['search']['value'];

        if (empty($match) === false) {
            $model->orLike('product_id', $match);
            $model->orLike('product_name', $match);
        }

        $recordsFiltered = $model->countAllResults(false);

        $model->limit($get['length'], $get['start']);

        $rows = $model->find();
        $data = [];

        $nomor = $get['start'];

        foreach ($rows as $row) {
            $i = 0;
            $d = [];
            $nomor++;
            $d[] = $nomor;

            foreach ($row as $value) {
                $column = $columns[$i];

                if (array_key_exists('formatter', $column) === true) {
                    $value = call_user_func($column['formatter'], $value, $row);
                }

                $d[] = $value;
                $i += 1;
            }

            $d[] = "<button type='button' class='btn btn-sm btn-warning py-0' data-id='" . $d[1] . "'>Edit</button> <button type='button' class='btn btn-sm btn-danger py-0' data-id='" . $d[1] . "'>Delete</button>";

            $data[] = $d;
        }

        $response = [
            'draw' => intval($get['draw']),
            'recordsTotal' => $recordsTotal,
            'recordsFiltered' => $recordsFiltered,
            'data' => $data
        ];

        return $response;
    }

    //--------------------------------------------------------------------
}