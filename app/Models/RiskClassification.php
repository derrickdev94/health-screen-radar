<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RiskClassification extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $casts = [
        'symptoms_possessed' => 'array'
    ];

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }
}
