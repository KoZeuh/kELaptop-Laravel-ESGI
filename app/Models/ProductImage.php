<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

use App\Models\Product;

class ProductImage extends Model
{
    use CrudTrait;
    use HasFactory;


    protected $fillable = [
        'product_id',
        'isPrimary',
        'path'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function setPathAttribute($value)
    {
        if (is_file($value)) {
            $file = $value;
            $product = $this->product()->first();

            if ($product) {
                $filename = strtolower($product->name) . '-' . Str::random(5) . '.' . $file->getClientOriginalExtension();
                $file->storeAs('upload/images/products', $filename, 'public');
                $this->attributes['path'] = $filename;
            }
        }
    }
}
