<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image_path',
        'product_id',
    ];

    protected $table = 'image';

    public function product()
    {
    return $this->belongsTo(Product::class);
    }

}