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

    public function getRouteKey(): string
    {
        return implode('-', [$this->OID, $this->FoodID, $this->PetID, $this->Month, $this->Year]);
    }

    public function resolveRouteBinding($value, $field = null)
    {
        [$ownerId, $foodId, $petId, $month, $year] = explode('-', $value) + [null, null, null, null, null];

        return $this->where('OID', $ownerId)
            ->where('FoodID', $foodId)
            ->where('PetID', $petId)
            ->where('Month', $month)
            ->where('Year', $year)
            ->firstOrFail();
    }

    protected function setKeysForSaveQuery($query)
    {
        return $query->where('OID', $this->getOriginal('OID'))
            ->where('FoodID', $this->getOriginal('FoodID'))
            ->where('PetID', $this->getOriginal('PetID'))
            ->where('Month', $this->getOriginal('Month'))
            ->where('Year', $this->getOriginal('Year'));
    }
}
