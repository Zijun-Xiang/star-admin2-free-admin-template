<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Owner extends Model
{
    use HasFactory;

    protected $primaryKey = 'OID';

    protected $fillable = [
        'LastName',
        'Street',
        'City',
        'ZipCode',
        'State',
        'Age',
        'AnnualIncome',
    ];

    public function pets(): BelongsToMany
    {
        return $this->belongsToMany(Pet::class, 'owns', 'OID', 'PetID')
            ->withPivot('Year', 'PetAgeatOwnership', 'PricePaid')
            ->withTimestamps();
    }

    public function purchases(): HasMany
    {
        return $this->hasMany(Purchase::class, 'OID', 'OID');
    }
}
