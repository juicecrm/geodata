<?php

namespace JuiceCRM\GeoData\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Region extends Model
{
	use HasUlids;

	protected $fillable = ['name', 'parent_region_id',];

	/**
	 * The Region model that is the parent of this Region model.
	 *
	 * @return BelongsTo
	 */
	public function parentRegion(): BelongsTo
	{
		$this->belongsTo(Region::class, 'parent_region_id');
	}

	/**
	 * The Region models that are children of this Region model.
	 *
	 * @return HasMany
	 */
	public function childRegions(): HasMany
	{
		$this->hasMany(Region::class, 'parent_region_id');
	}
}
