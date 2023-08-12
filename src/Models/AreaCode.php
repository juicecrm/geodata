<?php

namespace JuiceCRM\GeoData\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class AreaCode extends Model
{
    use HasUlids, SoftDeletes;

    protected $fillable = ['area_code', 'e164_country_code_id'];

    public function getTable()
    {
        return config('geodata.table_prefix').'area_codes';
    }

    public function e164CountryCode(): BelongsTo
    {
        return $this->belongsTo(E164CountryCode::class);
    }
}
