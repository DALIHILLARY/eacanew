<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Organisation extends Model
{
    use SoftDeletes;
    use HasFactory;
    public $table = 'organisations';

    public $fillable = [
        'name',
        'email',
        'slug',
        'phone',
        'website',
        'physical_address',
        'description',
        'country_id'
    ];

    protected $casts = [
        'name' => 'string',
        'email' => 'string',
        'slug' => 'string',
        'phone' => 'string',
        'website' => 'string',
        'physical_address' => 'string',
        'description' => 'string'
    ];

    public static array $rules = [
        'name' => 'required|string|max:100',
        'email' => 'nullable|string|max:255',
        'slug' => 'nullable|string|max:255',
        'phone' => 'nullable|string|max:255',
        'website' => 'nullable|string|max:255',
        'physical_address' => 'nullable|string|max:255',
        'description' => 'nullable|string',
        'country_id' => 'required',
        'deleted_at' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    public function country(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Admin\Country::class, 'country_id');
    }

    public function logo(): MorphOne
    {
        return $this->morphOne(Media::class, 'mediable');
    }
}
