<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Like extends Model
{
    use HasFactory;

    protected $table = 'likes';

    protected $primaryKey = null;

    public $incrementing = false;

    protected $fillable = [
        'PetID',
        'TypeofFood',
    ];

    public function pet(): BelongsTo
    {
        return $this->belongsTo(Pet::class, 'PetID', 'PetID');
    }
}
