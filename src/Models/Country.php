<?php

namespace JuiceCRM\GeoData\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model
{
    use HasUlids, SoftDeletes;

    protected $fillable = [
        'capital', 'common', 'created_at', 'deleted_at', 'independent', 'iso2', 'iso3', 'landlocked', 'latitude',
        'longitude', 'numeric', 'official', 'region_id', 'status', 'updated_at',
    ];

    /**
     * The Currency models that belong to this Country model.
     */
    public function currencies(): BelongsToMany
    {
        return $this->belongsToMany(Currency::class);
    }

    /**
     * The Demonym models that belong to this Country model.
     */
    public function demonyms(): BelongsToMany
    {
        return $this->belongsToMany(Demonym::class);
    }

    /**
     * The Language models that belong to this Country model.
     */
    public function languages(): BelongsToMany
    {
        return $this->belongsToMany(Language::class)
            ->withPivot(['i18n']);
    }

    /**
     * The Country models that are a neighbor of this Country model.
     */
    public function neighbors(): BelongsToMany
    {
        return $this->belongsToMany(Country::class, null, 'country_id', 'neighbor_country_id');
    }

    /**
     * The Country models of which this Country model is a neighbor.
     */
    public function neighborsOf(): BelongsToMany
    {
        return $this->belongsToMany(Country::class, null, 'neighbor_country_id', 'country_id');
    }
}
