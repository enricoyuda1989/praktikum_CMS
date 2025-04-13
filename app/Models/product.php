<?php

namespace App\Models;
use Illuminate\Support\Facades\Storage;

class Product
{
    private static function path()
    {
        return storage_path('app/products.json');
    }

    private static function read()
    {
        if (!file_exists(self::path())) return [];

        $content = file_get_contents(self::path());
        return json_decode($content, true) ?? [];
    }

    private static function write($products)
    {
        file_put_contents(self::path(), json_encode($products, JSON_PRETTY_PRINT));
    }

    public static function all()
    {
        return self::read();
    }

    public static function find($id)
    {
        $products = self::read();
        return $products[$id] ?? null;
    }

    public static function update($id, $data)
    {
        $products = self::read();

        if (isset($products[$id])) {
            $products[$id] = array_merge($products[$id], $data);
            self::write($products);
        }
    }
    
    public static function create($data)
    {
    $products = self::read();
    $id = count($products) > 0 ? max(array_keys($products)) + 1 : 1;
    $data['id'] = $id;
    $products[$id] = $data;
    self::write($products);
    }

    public static function delete($id)
    {
        $products = self::read();
        if (isset($products[$id])) {
            unset($products[$id]);
            self::write($products);
        }
    }
}