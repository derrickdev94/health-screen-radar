<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BasicInfo extends Model
{
    use HasFactory;
    protected $table = 'basic_info';
    protected $casts = [
        'date_of_visit' => 'datetime:Y-m-d'
    ];

    protected $guarded = [];

    /**
     * Get the client that owns the BasicInfo
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

}
