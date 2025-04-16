<?php

namespace App\Models;

class Product
{
    protected static function getDummyData()
    {
        return [
            ['id' => '1', 'name' => 'Laptop ASUS Vivobook 15', 'category' => 'Laptop', 'stock' => 300, 'price' => 10999000, 'description' => 'Intel Core i5, RAM 8GB, SSD 512GB, Layar 15.6" FHD'],
            ['id' => '2', 'name' => 'SSD Samsung 870 EVO 500GB', 'category' => 'Storage', 'stock' => 15, 'price' => 899000, 'description' => 'SSD SATA III, kecepatan baca 560MB/s, tulis 530MB/s'],
            ['id' => '3', 'name' => 'Router TP-Link AX-10', 'category' => 'Jaringan', 'stock' => 18, 'price' => 1200000, 'description' => 'Wi-Fi 6, Dual Band, Kecepatan hingga 1.5Gbps'],
        ];
    }

    public static function all()
    {
        return collect(self::getDummyData());
    }


    public static function find($id)
    {
        return collect(self::getDummyData())->firstWhere('id', $id);
    }
}
