<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use CrudTrait;
    use HasFactory;

    protected $primaryKey = 'product_id'; // Etant donné que la clé primaire de la table est product_id, on le spécifie ici pour éviter les erreurs
    public $incrementing = false; // Lié à la clé primaire, si elle est auto-incrémentée ou non
    protected $keyType = 'int';


    protected $fillable = ['quantity'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
