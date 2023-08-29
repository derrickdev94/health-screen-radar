<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ClientCurrentEligiblity extends Model
{
    use HasFactory;

    protected $casts = [
        'symptoms_indicating_advanced_illness' => 'array'
    ];

    protected $table = 'clients_current_eligiblity';

    protected $guarded = [];

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }
}
