<?php

namespace JuiceCRM\GeoData\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Demonym extends Model
{
    use HasUlids, SoftDeletes;

    protected $fillable = ['created_at', 'deleted_at', 'female', 'name', 'updated_at'];
}
