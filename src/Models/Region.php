<?php

namespace JuiceCRM\GeoData\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Region extends Model
{
    use HasUlids, SoftDeletes;

    protected $fillable = ['created_at', 'deleted_at', 'name', 'parent_region_id', 'updated_at'];

    /**
     * The Region model that is the parent of this Region model.
     */
    public function parentRegion(): BelongsTo
    {
        $this->belongsTo(Region::class, 'parent_region_id');
    }

    /**
     * The Region models that are children of this Region model.
     */
    public function childRegions(): HasMany
    {
        $this->hasMany(Region::class, 'parent_region_id');
    }
}
