<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ClientGeneralEligiblity extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'clients_general_eligiblity';

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }
}
