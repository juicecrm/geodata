<?php

namespace JuiceCRM\GeoData\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model
{
    use HasUlids, SoftDeletes;

    /**
     * @inheritDoc
     */
    protected $fillable = [
        'capital', 'common', 'created_at', 'deleted_at', 'independent', 'iso2', 'iso3', 'landlocked', 'latitude',
        'longitude', 'numeric', 'official', 'region_id', 'status', 'updated_at',
    ];

    /**
     * @inheritDoc
     */
    public function getTable()
    {
        return config('geodata.table_prefix').'countries';
    }

    /**
     * The Currency models that belong to this Country model.
     */
    public function currencies(): BelongsToMany
    {
        return $this->belongsToMany(Currency::class, config('geodata.table_prefix').'country_currency');
    }

    /**
     * The Demonym models that belong to this Country model.
     */
    public function demonyms(): BelongsToMany
    {
        return $this->belongsToMany(Demonym::class, config('geodata.table_prefix').'country_demonym');
    }

    /**
     * The Language models that belong to this Country model.
     */
    public function languages(): BelongsToMany
    {
        return $this->belongsToMany(Language::class, config('geodata.table_prefix').'country_language')
            ->withPivot(['i18n']);
    }

    /**
     * The Country models that are a neighbor of this Country model.
     */
    public function neighbors(): BelongsToMany
    {
        return $this->belongsToMany(Country::class, config('geodata.table_prefix').'country_country', 'country_id',
			'neighbor_country_id');
    }

    /**
     * The Country models of which this Country model is a neighbor.
     */
    public function neighborsOf(): BelongsToMany
    {
        return $this->belongsToMany(Country::class, config('geodata.table_prefix').'country_country',
			'neighbor_country_id', 'country_id');
    }
}
