<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Purchase extends Model
{
    use HasFactory;

    protected $table = 'purchases';

    protected $primaryKey = null;

    public $incrementing = false;

    protected $fillable = [
        'OID',
        'FoodID',
        'PetID',
        'Month',
        'Year',
        'Quantity',
    ];

    public function owner(): BelongsTo
    {
        return $this->belongsTo(Owner::class, 'OID', 'OID');
    }

    public function food(): BelongsTo
    {
        return $this->belongsTo(Food::class, 'FoodID', 'FoodID');
    }

    public function pet(): BelongsTo
    {
        return $this->belongsTo(Pet::class, 'PetID', 'PetID');
    }
}
