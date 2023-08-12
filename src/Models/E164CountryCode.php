<?php

namespace JuiceCRM\GeoData\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class E164CountryCode extends Model
{
    use HasUlids, SoftDeletes;

    protected $fillable = ['country_id', 'country_code'];

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    public function areaCodes(): HasMany
    {
        return $this->hasMany(AreaCode::class);
    }
}
