<?php

namespace JuiceCRM\GeoData\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Demonym extends Model
{
    use HasUlids, SoftDeletes;

    protected $fillable = ['created_at', 'deleted_at', 'female', 'name', 'updated_at'];

    /**
     * The Country models to which this Demonym model belongs.
     */
    public function countries(): BelongsToMany
    {
        return $this->belongsToMany(Country::class);
    }
}
