<?php

namespace App\Imports;


use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Modules\Products\Entities\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Row;
use Maatwebsite\Excel\Concerns\OnEachRow;

//class ProductImport implements ToModel
//{
//    /**
//     * @param array $row
//     *
//     * @return Product
//     */
//    public function model(array $row)
//    {
//        if (!isset($row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7], $row[8], $row[9], $row[11], $row[12], $row[13], $row[14], $row[10])) {
//            return null;
//        }
//        return new Product([
//            'id' => $row[1],
//            'category_id' => $row[2],
//            'subcategory_id' => $row[3],
//            'sub_subcategory_id' => $row[4],
//            'title' => $row[5],
//            'image' => $row[6],
//            'images' => $row[7],
//            'vip' => $row[8],
//            'best_sellers' => $row[9],
//            'status' => $row[10],
//            'discount' => $row[11],
//            'discount_count' => $row[12],
//            'description' => $row[13],
//            'brand' => $row[14],
//        ]);
//    }
//
//
//}


class ProductImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Product([
            'id' => $row['id'],
            'category_id' => $row['category_id'],
            'subcategory_id' => $row['subcategory_id'],
            'sub_subcategory_id' => $row['sub_subcategory_id'],
            'title' => $row['title'],
            'vip' => $row['vip'],
            'discount' => $row['discount'],
            'discount_count' => $row['discount_count'],
            'description' => $row['description'],
            'status' => $row['status'],
            'count' => $row['count'],
            'price' => $row['price'],
            'image' => $row['image'],
            'images' => null,
        ]);
    }
}


