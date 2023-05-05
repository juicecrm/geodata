<?php

namespace JuiceCRM\GeoData\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subdivision extends Model
{
    use HasUlids, SoftDeletes;

    /**
     * @inheritdoc
     */
    protected $fillable = ['country_id', 'key', 'name', 'parent_subdivision_id'];

    /**
     * @inheritDoc
     */
    public function getTable()
    {
        return config('geodata.table_prefix').'countries';
    }

    /**
     * The Subdivision models that belong to this Subdivision.
     *
     * @return HasMany
     */
    public function childSubdivisions(): HasMany
    {
        return $this->hasMany(Subdivision::class, 'parent_subdivision_id');
    }

    /**
     * The Country model to which this Subdivision belongs.
     *
     * @return BelongsTo
     */
    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    /**
     * The Subdivision model to which this Subdivision belongs.
     *
     * @return BelongsTo
     */
    public function parentSubdivision(): BelongsTo
    {
        return $this->belongsTo(Subdivision::class);
    }
}
