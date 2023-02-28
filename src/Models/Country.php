<?php

namespace JuiceCRM\GeoData\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasUlids;

    protected $fillable = [
        'capital', 'common', 'created_at', 'deleted_at', 'independent', 'iso2', 'iso3', 'landlocked', 'latitude',
        'longitude', 'numeric', 'official', 'region_id', 'status', 'updated_at',
    ];
}