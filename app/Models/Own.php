<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Own extends Model
{
    use HasFactory;

    protected $table = 'owns';

    protected $primaryKey = null;

    public $incrementing = false;

    protected $fillable = [
        'PetID',
        'Year',
        'OID',
        'PetAgeatOwnership',
        'PricePaid',
    ];

    public function pet(): BelongsTo
    {
        return $this->belongsTo(Pet::class, 'PetID', 'PetID');
    }

    public function owner(): BelongsTo
    {
        return $this->belongsTo(Owner::class, 'OID', 'OID');
    }

    public function getRouteKey(): string
    {
        return implode('-', [$this->PetID, $this->Year, $this->OID]);
    }

    public function resolveRouteBinding($value, $field = null)
    {
        [$petId, $year, $ownerId] = explode('-', $value) + [null, null, null];

        return $this->where('PetID', $petId)
            ->where('Year', $year)
            ->where('OID', $ownerId)
            ->firstOrFail();
    }

    protected function setKeysForSaveQuery($query)
    {
        return $query->where('PetID', $this->getOriginal('PetID'))
            ->where('Year', $this->getOriginal('Year'))
            ->where('OID', $this->getOriginal('OID'));
    }
}
