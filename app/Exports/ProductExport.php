<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Modules\Products\Entities\Product;

class ProductExport implements FromQuery, WithMapping, WithHeadings
{

//    public function collection()
//    {
//        return Product::all();
//    }

    public function query()
    {
        return Product::query();
    }

    public function map($products): array
    {
        return [
            ucwords($products->id),
            ucwords($products->title),
            ucwords($products->status),
            ucwords($products->price),
            ucwords($products->category_id),
            ucwords($products->image),
            ($products->images),
            ucwords($products->subcategory_id),
            ucwords($products->sub_subcategory_id),
            ucwords($products->description),
            ucwords($products->vip),
            ucwords($products->count),
            ucwords($products->slug),
        ];

    }

    public function headings(): array
    {
        return [
            'id',
            'title',
            'status',
            'price',
            'category_id',
            'image',
            'images',
            'subcategory_id',
            'sub_subcategory_id',
            'description',
            'vip',
            'count',
            'slug',
        ];
    }
}
