<?php

namespace JuiceCRM\GeoData\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Currency extends Model
{
    use HasUlids, SoftDeletes;

    protected $fillable = [
		'created_at', 'deleted_at', 'iso3', 'major_name', 'major_symbol', 'minor_name', 'minor_symbol', 'minor_value',
		 'name', 'numeric', 'updated_at'
    ];

	/**
	 * The Country models to which this Currency model belongs.
	 *
	 * @return BelongsToMany
	 */
	public function countries(): BelongsToMany
	{
		return $this->belongsToMany(Country::class);
	}
}
