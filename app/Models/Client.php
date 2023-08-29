<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Client extends Model
{
    use HasFactory;
    protected $casts = [
        'date_of_birth'=> 'date:Y-m-d'
    ];

    protected $guarded = [];

    /**
     * Get the user associated with the Client
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function basicInfo(): HasOne
    {
        return $this->hasOne(BasicInfo::class);
    }

    public function clientAddress(): HasOne
    {
        return $this->hasOne(ClientAddress::class);
    }

    public function clientCurrentEligiblity(): HasOne
    {
        return $this->hasOne(ClientCurrentEligiblity::class);
    }

    public function clientGeneralEligiblity(): HasOne
    {
        return $this->hasOne(ClientGeneralEligiblity::class);
    }

    public function riskClassification(): HasOne
    {
        return $this->hasOne(RiskClassification::class);
    }

    public function clientReferral(): HasOne
    {
        return $this->hasOne(ClientReferral::class);
    }
}
