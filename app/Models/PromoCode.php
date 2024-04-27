<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PromoCode extends Model
{
    use CrudTrait;
    use HasFactory;

    protected $primaryKey = 'code'; // Etant donné que la clé primaire de la table est product_id, on le spécifie ici pour éviter les erreurs
    public $incrementing = false; // Lié à la clé primaire, si elle est auto-incrémentée ou non
    protected $keyType = 'string';

    protected $fillable = ['code', 'discount', 'expires_at'];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function isValid()
    {
        return $this->expires_at > now();
    }
}
