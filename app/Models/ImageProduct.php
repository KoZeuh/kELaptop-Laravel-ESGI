<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Product;

class ImageProduct extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
    */
    protected $fillable = [
        'isPrimary',
        'path'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
