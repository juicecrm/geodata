<?php

namespace JuiceCRM\GeoData\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasUlids;

    protected $fillable = [
		'iso3', 'major_name', 'major_symbol', 'minor_name', 'minor_symbol', 'minor_value', 'name', 'numeric'
    ];
}
