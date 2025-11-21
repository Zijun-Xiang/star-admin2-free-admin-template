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
}
