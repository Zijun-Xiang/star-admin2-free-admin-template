<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pet extends Model
{
    use HasFactory;

    protected $primaryKey = 'PetID';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'Name',
        'Age',
        'Street',
        'City',
        'ZipCode',
        'State',
        'TypeofPet',
    ];

    public function owners(): BelongsToMany
    {
        return $this->belongsToMany(Owner::class, 'owns', 'PetID', 'OID')
            ->withPivot('Year', 'PetAgeatOwnership', 'PricePaid')
            ->withTimestamps();
    }

    public function owns(): HasMany
    {
        return $this->hasMany(Own::class, 'PetID', 'PetID');
    }

    public function likes(): HasMany
    {
        return $this->hasMany(Like::class, 'PetID', 'PetID');
    }

    public function purchases(): HasMany
    {
        return $this->hasMany(Purchase::class, 'PetID', 'PetID');
    }
}
