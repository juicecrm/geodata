<?php

namespace JuiceCRM\GeoData\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Language extends Model
{
    use HasUlids, SoftDeletes;

    protected $fillable = ['created_at', 'deleted_at', 'iso2', 'iso3-b', 'iso3-t', 'name', 'updated_at'];

	/**
	 * The Country models to which this Language model belongs.
	 *
	 * @return BelongsToMany
	 */
	public function countries(): BelongsToMany
	{
		return $this->belongsToMany(Country::class)
			->withPivot(['i18n']);
	}
}
