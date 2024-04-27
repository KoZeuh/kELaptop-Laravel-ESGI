<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use CrudTrait;
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'path_banner'
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function setPathBannerAttribute($value)
    {
        if (is_file($value)) {
            $file = $value;

            $filename = strtolower($this->attributes['name']) . '-' . Str::random(5) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('upload/images/categories', $filename, 'public');
            $this->attributes['path_banner'] = $filename;
        }
    }
}
